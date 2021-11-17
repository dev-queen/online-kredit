<?php

namespace App\Http\Controllers\Admin\SmsTemplate;

use App\Http\Controllers\Controller;
use App\Models\Sms_template;
use Illuminate\Http\Request;
use App\Models\LetterName;

class CreateController extends Controller
{
    public function __invoke()
    {
        $LetterNames = LetterName::whereActive('1')->get();
        return view('admin.smstemplates.create', compact('LetterNames'));
    }
}
