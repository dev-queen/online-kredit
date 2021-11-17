<?php

namespace App\Http\Controllers\Admin\Offer;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\show_case;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke($showcaseId = 1)
    {
        $showcases = show_case::get();
        $offers = Offer::orderBy('sort')->get()->where('id_showcase', $showcaseId);


       return view('admin.offers.index', compact('offers', 'showcases', 'showcaseId'));
    }
}
