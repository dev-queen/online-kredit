<?php

namespace App\Http\Controllers\Admin\Showcase;

use App\Http\Controllers\Controller;
use App\Models\show_case;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke($showcaseId = 1)
    {
        $showcases = show_case::get();
        $showcases1 = show_case::get();
        $offers = Offer::orderBy('sort')->get()->where('id_showcase', $showcaseId);

        return view('admin.showcases.index', compact('offers','showcases', 'showcaseId', 'showcases1' ));
    }
}
