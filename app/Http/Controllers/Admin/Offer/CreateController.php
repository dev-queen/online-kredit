<?php

namespace App\Http\Controllers\Admin\Offer;

use App\Http\Controllers\Controller;
use App\Models\show_case;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        $showCases=Show_case::all();
        return view('admin.offers.create', compact('showCases'));
    }
}
