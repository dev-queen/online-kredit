<?php

namespace App\Http\Controllers\Admin\SmsTemplate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sms_template;

class DeleteController extends Controller
{
    public function __invoke(Sms_template $smstemplate)
    {
        $smstemplate->delete();
        return redirect()->route('admin.sms-template.index');
    }
}
