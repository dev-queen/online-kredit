<?php

namespace App\Http\Controllers\Admin\Test;

use App\Http\Controllers\Controller;
use App\Helpers\SxGeo;
use Illuminate\Http\Request;
use DB;
use App\Services\ShortLink;
use App\Models\EventLog;
use App\Models\Setting;
use App\Models\Client;
use App\Models\Sms_template;
use App\Models\Link;
use App\Models\LetterName;
use App\Services\EasySms;
use App\Services\CronSms;

class IndexController extends Controller
{
    public function __invoke()
    {

        CronSms::cronSmsFilter(1);

    }
}
