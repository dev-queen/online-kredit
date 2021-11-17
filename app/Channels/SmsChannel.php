<?php

namespace App\Channels;

use App\Models\SmsLog;
use Illuminate\Notifications\Notification;

class SmsChannel
{
    public function send($notifiable, Notification $notification)
    {
        $phone = $this->clearPhone($notifiable->phone);
        $data = [
            'connect_id' => env('SMS_API_ID'),
            'login' => env('SMS_API_LOGIN'),
            'password' => env('SMS_API_PASSWORD'),
            'text ' => $notification->toSms($notifiable),
            //originator
            'phone' => $phone,
            //'r' => 'api/msg_send',
        ];

        if ($data['message']) {
            if (config('services.sms.send')) {
                $query = http_build_query($data);
                $r = file_get_contents("http://cp.websms.by?$query");

                SmsLog::create([
                    'message' => $data['message'],
                    'phone' => $phone,
                ]);
            }
        }
    }
}