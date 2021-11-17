<?php

namespace App\Http\Controllers\Admin\SmsTemplate;

use App\Http\Controllers\Controller;
use App\Models\Sms_template;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\SmsTemplate\StoreRequest;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)

    {
        $data = $request->validated();

        if (isset($data['active']) && $data['active'] == 'on') {
            $data['active'] = 1;
        }

        if (isset($data['event_type']) && $data['event_type'] == 'on') {
            $data['event_type'] = 'registration';
        }

        if (isset($data['check_time_zone']) && $data['check_time_zone'] == 'on') {
            $data['check_time_zone'] = 1;
        }

//        if(isset($data['links'])) {
//            $data['links'] = (serialize($data['links']));
//        }

       
        Sms_template::create($data);

        return redirect()->route('admin.sms-template.index');
    }
}
