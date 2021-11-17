<?php

namespace App\Http\Controllers\Admin\SmsTemplate;

use App\Http\Controllers\Controller;
use App\Models\Sms_template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke()
    {
        $sms_templates = Sms_template::paginate(15);

       return view('admin.smstemplates.index', compact('sms_templates'));
    }
}
