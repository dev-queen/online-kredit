<?php

namespace App\Http\Controllers\Sms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CronSms;
use App\Models\EventLog;

class MicroSmsServiceController extends Controller
{
    public function __invoke()
    {
        if (isset($_POST)) {
            $arResultSms = $_POST['SMS'];

            foreach ($arResultSms as $sms) {
                $event = EventLog::where('id', $sms['id'])->firstOrFail();

                if (!empty($event)) {
                    $pathDir = CronSms::getLogsPathDir('sms/callback/log/' . $event->cron_id);
                    $logFileName = $pathDir . '/' . date('Y-m-d') . '.txt';

                    $event->status = $sms['status'];
                    $event->save();

                    file_put_contents($logFileName, 'phone=' . $event->phone . ' event_id=' . $event->id . ' template_id=' . $event->template_id . ' user_id=' . $event->user_id . ' status=' . $event->status . ' type=' . $event->type . ' cron_id=' . $event->cron_id . ' date_send=' . date('Y-m-d H:i:s') . PHP_EOL, FILE_APPEND);
                }
            }

        }
    }
}
