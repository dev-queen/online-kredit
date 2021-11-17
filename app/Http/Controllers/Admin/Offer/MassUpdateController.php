<?php

namespace App\Http\Controllers\Admin\Offer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\show_case;
use App\Models\Offer;
use App\Http\Requests\Admin\Showcase\MassUpdateRequest;

class MassUpdateController extends Controller
{
    public function __invoke(Request $request, Offer $offer)
    {
        $sort = $request->input('sort');
        $name = $request->input('name');
        $showca = $request->input('id_showcase');
        $display = $request->input('display');
        $url = $request->input('url');

        foreach ($sort as $key => $data_to) {
            $data = Offer::where('id', $key)->first();
            if ($data) {
                $data->sort = $data_to;
                $data->update();
            }
        }

        foreach ($name as $key => $data_to) {
            $data = Offer::where('id', $key)->first();
            if ($data) {
                $data->name = $data_to;
                $data->update();
            }
        }
        foreach ($url as $key => $data_to) {
            $data = Offer::where('id', $key)->first();
            if ($data) {
                $data->url = $data_to;
                $data->update();
            }
        }

        foreach ($showca as $key => $data_to) {
            $data = Offer::where('id', $key)->first();
            if ($data) {
                $data->id_showcase = $data_to;
                $data->update();
            }
        }

        foreach ($display as $key => $data_to) {
            $data = Offer::where('id', $key)->first();
            if ($data) {
                $data->display = 1;
                $data->update();
            } else {
                $data->display = 0;
                $data->update();
            }
        }


        return redirect()->route('admin.offer.index');
    }
}
