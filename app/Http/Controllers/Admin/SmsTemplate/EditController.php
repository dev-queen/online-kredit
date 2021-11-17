<?php

namespace App\Http\Controllers\Admin\SmsTemplate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sms_template;
use App\Models\LetterName;


class EditController extends Controller
{
    public function __invoke(Sms_template $sms_template)
    {
        $LetterNames = LetterName::whereNotNull('active')->get();

        return view('admin.smstemplates.edit', compact('sms_template', 'LetterNames'));
    }
}
