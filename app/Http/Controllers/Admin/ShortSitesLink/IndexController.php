<?php

namespace App\Http\Controllers\Admin\ShortSitesLink;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ShortSitesLink;

class IndexController extends Controller
{
    public function __invoke()
    {
        $links = ShortSitesLink::get();

       return view('admin.short-sites-links.index', compact('links'));
    }
}
