<?php

namespace App\Http\Controllers\Sms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\Client;
use App\Models\Sms_template;

class ShortUrlController extends Controller
{
    public function __invoke(Request $request)
    {
        if (!empty($request->input('source_uid'))) {
            $arLink = Link::where('uid', $request->input('source_uid'))->first();
            
            if (!empty($arLink)) {

                $links = Sms_template::where('id', $arLink->template_id)->first();
                $link = $links->links;

                //$identifyClient = Clients::where('id', $arLink->user_id);

                $arLink->click_count = $arLink->click_count + 1;
                $arLink->link_visited = $link;
                $arLink->save();

                return array('status' => 200, 'redirect_url' => $link);
            }
        }
        return array('status' => '400', 'error' => 'Source not found');

    }
}