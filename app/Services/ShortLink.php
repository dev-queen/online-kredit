<?php


namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\Link;

class ShortLink
{
    public static function generateShortLink($template_id, $user_id, $eventlog_id )
    {
        $linkSites = DB::table('short_sites_links')->whereNotNull('active')->get('url');

        $arlinkSite = array();
        if (!empty($linkSites)) {
            foreach ($linkSites as $linkSite) {
                $arlinkSite[] = $linkSite->url;
            }
        }
        $lastSitesNum = array_key_last($arlinkSite);

        $uid = base_convert(intval($template_id), 10, 36) . '_' . base_convert(intval($user_id), 10, 36);

        $link = $arlinkSite[random_int(0, $lastSitesNum)] . '/' . $uid;
        $input = [
            'uid' => $uid,
            'user_id' => $user_id,
            'eventlog_id'=> $eventlog_id,
            'links' => $link,
            'template_id' => $template_id,
        ];

        $newLink = Link::create($input);
        return $arlinkSite[random_int(0, $lastSitesNum)] . '/' . $uid;

    }

}