<?php

namespace App\Http\Controllers\Admin\SmsTemplate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sms_template;
use App\Http\Requests\Admin\SmsTemplate\UpdateRequest;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Sms_template $SmsTemplate)
    {
        $data = $request->validated();

        if (isset($data['active']) && $data['active'] == 'on') {
            $data['active'] = 1;
        } else
            $data['active'] = null;

        if (isset($data['event_type']) && $data['event_type'] == 'on') {
            $data['event_type'] = 1;
        } else
            $data['event_type'] = null;

        if (isset($data['check_time_zone']) && $data['check_time_zone'] == 'on') {
            $data['check_time_zone'] = 1;
        } else
            $data['check_time_zone'] = null;

        $SmsTemplate->update($data);

        return redirect()->route('admin.sms-template.index');
    }
}
