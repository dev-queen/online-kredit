<?php

namespace App\Http\Controllers\Admin\Offer;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;
use App\Models\show_case;

class EditController extends Controller
{
    public function __invoke(Offer $offer)
    {
        $showCases=Show_case::all();
        return view('admin.offers.edit', compact('offer', 'showCases'));
    }
}
