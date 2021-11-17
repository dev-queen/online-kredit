<?php

namespace App\Http\Controllers\Admin\Offer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\show_case;
use App\Http\Requests\Admin\Offer\UpdateRequest;

class DeleteController extends Controller
{
    public function __invoke(Offer $offer)
    {
        $offer->delete();
        return redirect()->route('admin.offer.index');
    }
}
