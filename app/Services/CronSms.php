<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class CronSms
{
    public static function cronSmsFilter($cron_id)
    {
        $start = time();
        $minutes = 15;

        $pathDir = self::getLogsPathDir('sms/cron');
        $logPathDir = self::getLogsPathDir('sms/cron/log/' . $cron_id);

        $fileName = $pathDir . '/' . '_is_sms_' . $cron_id . '.txt';

        $logFileName = $logPathDir . '/' . date('Y-m-d') . '.txt';

        if (file_exists($fileName)) {
            $fileDate = strtotime(file_get_contents($fileName));
            if (time() - $fileDate > (60 * $minutes)) {// если файл создан более заданного количества минут назад ($minutes), значит что-то не то и надо удалить файл
                unlink($fileName);
            }
            return false;
        }

        file_put_contents($fileName, date('d.m.Y H:i:s'));

        $arEvents = DB::table('event_logs')
            ->whereNull('status')
            ->WhereNotNull('user_id')
            ->where('phone', '!=', ' ')
            ->whereCron_id($cron_id)
            ->where('send_time', '<=', time())
            ->limit(100)
            ->orderBy('time', 'desc')
            ->get();

        $i = 0;
        $arSmsForMicroService = [];
        file_put_contents($logFileName, PHP_EOL, FILE_APPEND);

        if (!empty($arEvents)) {

            $server_timezone = date_default_timezone_get();

            foreach ($arEvents as $arEvent) {

                self::smsHandler($arEvent, $logFileName, $i, $arSmsForMicroService);

                if ((time() - $start) > (60 * $minutes)) {
                    // If the script runs longer than necessary
                    file_put_contents($logFileName, 'Exceeding the time allocated for the script' . PHP_EOL, FILE_APPEND);
                    die();
                }

                date_default_timezone_set($server_timezone);
            }

            self::sendMicroServiceSms($arSmsForMicroService);
        }

        $peak_mb = round((memory_get_peak_usage() / 1000000), 2);
        $limit_mb = ini_get('memory_limit');

        file_put_contents($logFileName, date('d.m.Y H:i:s') . ' - count total: ' . count($arEvents) . ' count:' . $i . ' time: ' . (time() - $start) . ' memory peak=' . $peak_mb . 'M memory_limit=' . $limit_mb . PHP_EOL, FILE_APPEND);
        if (file_exists($fileName))
            unlink($fileName);
    }

    public static function getLogsPathDir($target_dir = false)
    {
        $pathDir = storage_path('logs/test.txt');

        if (!empty($target_dir))
            $pathDir .= '/' . $target_dir;

        if (!file_exists($pathDir))
            mkdir($pathDir, 0777, true);

        return $pathDir;
    }

    public static function smsHandler($arEvent, $logFileName, &$i, &$arSmsForMicroService)
    {
        $needSend = true;

        // Проверяем были ли уже отправлены sms, по данному шаблону, для пользователя
        $checkEvent = DB::table('event_logs')
            ->WhereNotNull('status')
            ->where('id', '!=', $arEvent->id)
            ->where('template_id', '=', $arEvent->template_id)
            ->where('user_id', '=', $arEvent->user_id)
            ->where('type', '=', $arEvent->type)
            ->orderBy('time', 'desc')
            ->first();


        if (!empty($checkEvent)) {
            // Если sms было отправлено пользователю с использованием текущего шаблона, удаляем это событие и продолжаем 
            $arEvent->delete();
            return false;
        } else {
            // считаем кол-во отправленных клиенту смс
            $countSms = DB::table('event_logs')
                ->WhereNotNull('status')
                ->where('user_id', '=', $arEvent->user_id)
                ->orderBy('time', 'desc')
                ->limit(7)
                ->count();
            $checkStatus = NULL;

            //Если после 5 смс не было не одного перехода по ссылке в смс то закрываем смс
//            if ($needSend) {
//                if (count($countSms) >= 5) {
//                    $countVisited = VisitedSmsLinks::find()
//                        ->where(['user_id' => $arEvent['user_id']])
//                        ->andWhere(['not', ['click_count' => 0]])
//                        ->andWhere('updated_at >' . $countSms[4]->time)
//                        ->limit(1)
//                        ->asArray()
//                        ->all();
//                    
//                    //написать запрос проверки перехода по ссылкам
//                    
//                    if (empty($countVisited)) {
//                        $checkStatus = 'has_not_visited_link';
//                        $needSend = false;
//                    }
//                }
//            }
            if (!$needSend) {
                //меняем статус
                DB::table('event_logs')
                    ->where('id', $arEvent->id)
                    ->update(['status' => $checkStatus]);

                //Если checkStatus пустой или has_not_visited_link, то удаляем смс будущие пользователя по user_id

                DB::table('event_logs')
                    ->where(['user_id' => $arEvent->user_id])
                    ->whereNull(['status'])
                    ->delete();

                return false;
            }

        }
        if ($needSend) {

            $arSmsForMicroService['EVENT'][] = array(
                'message' => $arEvent->text,
                'clientId' => $arEvent->phone,
                'source' => $arEvent->letter_name,
                'eventId' => $arEvent->id
            );

            $i++;

            //меняем статус
            DB::table('event_logs')
                ->where('id', $arEvent->id)
                ->update(['status' => 'in_process']);

            file_put_contents($logFileName, 'phone=' . $arEvent->phone . ' event_id=' . $arEvent->id . ' template_id=' . $arEvent->template_id . ' user_id=' . $arEvent->user_id . ' status=' . $arEvent->status . ' type=' . $arEvent->type . ' cron_id=' . $arEvent->cron_id . ' date_send=' . date('Y-m-d H:i:s') . PHP_EOL, FILE_APPEND);
        }
        return;

    }


    public static function sendMicroServiceSms($arraySms)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_URL, env('MICROSMS'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($arraySms));
        curl_exec($ch);
        curl_close($ch);

    }


}