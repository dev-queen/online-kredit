<?php


namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\EventLog;
use App\Models\Sms_template;
use App\Models\Client;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use App\Services\ShortLink;
use App\Helpers\SxGeo;


class EasySms
{
//    protected static $login = 'Ryabina_servis'; //заменить данные и поместить значения в .env
//    protected static $password = 'mLFzJebN';
//    protected static $connect_id = '2699';
//    protected static $originator = 'RUSZAIM24';
//
//    public static function send($phone, $message) // возможно стоит вынести отправку смс в отдельный класс
//    {
//        $url = 'https://xml.smstec.ru/api/v1/easysms/' . self::$connect_id . '/send_sms';
//        $response = Http::get($url, [
//            'login' => self::$login,
//            'password' => self::$password,
//            'text' => $message,
//            'originator' => self::$originator,
//            'phone' => $phone
//        ]);
//
//        return $response->body();
//    }

    public static function sendEventRegistration($phone, $user_id) //формирование сообщения в EventsLog
    {
        $events = DB::table('sms_templates')->where('event_type', 'registration')->whereNotNull('active')->get();
        $setting = Setting::first();
        $user_sms = DB::table('event_logs')->where('user_id', $user_id)->count();
        $client = Client::whereId($user_id)->first();

        $testinput = [];

        if ($user_sms < $setting->sms_max) {

            foreach ($events as $event) {
                $time = time();

                if (!empty($client) && !empty($client->ip)) {
                    $delayTimezone = self::defineTimezone($client->ip);
                } else {
                    $delayTimezone = 0;
                }

                if (empty($event->delay_time)) {
                    $delay = 1;
                } else {
                    $delay = $event->delay_time;
                }
                $delay = self::finalyDelay($delay, $event->check_time_zone, $client->ip, $event->time_from, $event->time_to, $delayTimezone);
                $log = EventLog::create();

                $text = $event->template;
                if (is_numeric(stripos($text, '{LINK}'))) {
                    $text = str_replace('{LINK}', ShortLink::generateShortLink($event->id, $user_id, $log->id), $text);
                }

                $sendTime = $delay * 60 + $time;

                $input = [
                    'text' => $text,
                    'time' => $time,
                    'template_id' => $event->id,
                    'user_id' => $user_id,
                    'delay' => $delay,
                    'type' => $event->event_type,
                    'phone' => $phone,
                    'letter_name' => $event->letter_name,
                    'cron_id' => rand(1, 3),
                    'delay_timezone' => $delayTimezone,
                    'cascade' => '0',
                    'send_time' => $sendTime
                ];
                $log->update($input);
            }
        }
    }

    public static function defineTimezone($ip) //Определение таймзоны
    {
        // If need to consider the timezone
        mb_internal_encoding("8bit");
        $SxGeo = new SxGeo(storage_path('app/include/SxGeo/SxGeoCityNew.dat'), 0, storage_path('app/include/SxGeo/region.tsv'));
        $cityInfo = $SxGeo->getCityFull($ip);
        mb_internal_encoding("UTF-8");

        if ($cityInfo) {
            $nowTimezone = date_default_timezone_get();
            $timezone = $cityInfo['timezone'];

            $myTimezone = new \DateTimeZone($nowTimezone);
            $userTimezone = new \DateTimeZone($timezone);
            $origin_dt = new \DateTime("now", $myTimezone);
            $remote_dt = new \DateTime("now", $userTimezone);

            $delayTimezone = ($userTimezone->getOffset($remote_dt) - $myTimezone->getOffset($origin_dt)) / 3600;

            return $delayTimezone;
        }
    }

    public static function finalyDelay($delay, $checkTimeZone, $ip, $time_from, $time_to, $delayTimezone) //расчет окончательной задержки
    {
        mb_internal_encoding("8bit");
        $SxGeo = new SxGeo(storage_path('app/include/SxGeo/SxGeoCityNew.dat'), 0, storage_path('app/include/SxGeo/region.tsv'));
        $cityInfo = $SxGeo->getCityFull($ip);
        mb_internal_encoding("UTF-8");

        if ($cityInfo) {
            $timezone = $cityInfo['timezone'];
        }

        $created_at = time();
        $date = $created_at + $delay * 60;
        $defaultTZ = date_default_timezone_get();
//        dd($defaultTZ);

        if ($checkTimeZone == 1 && !empty($ip) && $cityInfo) {
            date_default_timezone_set($timezone);
            $start_date = strtotime(date('Y-m-d ' . $time_from, $date));
            $end_date = strtotime(date('Y-m-d ' . $time_to, $date));

            $inRange = ($date >= $start_date && $date <= $end_date) ? true : false;

            date_default_timezone_set($defaultTZ);
        } else {
            $start_date = strtotime(date('Y-m-d ' . $time_from, $date));
            $end_date = strtotime(date('Y-m-d ' . $time_to, $date));

            $inRange = ($date >= $start_date && $date <= $end_date) ? true : false;
        }

        if ($start_date < $end_date) {

            if (!$inRange) {

                if ($date > $end_date) {
                    $start_date = strtotime(date('Y-m-d ' . $time_from, ($created_at + $delay * 60 + 86400)));
                    $end_date = strtotime(date('Y-m-d ' . $time_to, ($created_at + $delay * 60 + 86400)));
                } else {
                    $start_date = strtotime(date('Y-m-d ' . $time_from, ($created_at + $delay * 60)));
                    $end_date = strtotime(date('Y-m-d ' . $time_to, ($created_at + $delay * 60)));
                }

                $delay = (rand($start_date, $end_date) - $created_at) / 60;


                if ($checkTimeZone == 1 && !empty($ip) && !empty($delayTimezone)) {
                    $delay = (round($delay) - ($delayTimezone * 60));
                } else {
                    $delay = round($delay);
                }

            }
        }

        return $delay;

    }


}