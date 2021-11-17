<?php

namespace App\Http\Controllers\Admin\Offer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\show_case;
use App\Http\Requests\Admin\Offer\UpdateRequest;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Offer $offer)
    {
        $data = $request->validated();
        if (isset($data['display'])&&$data['display']== 'on') {
            $data['display'] = 1;
        }
        else
            $data['display'] = null;
        $offer->update($data);
        $showCases=Show_case::all();

        return redirect()->route('admin.offer.index');
    }
}
