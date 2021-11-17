<?php

namespace App\Http\Controllers\Admin\Showcase;

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
        $quality = $request->input('quality');
        $color = $request->input('color');
        $color_for_dice = $request->input('colorfordice');
        $active = $request->input('active');

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
        foreach ($quality as $key => $data_to) {
            $data = Offer::where('id', $key)->first();
            if ($data) {
                $data->quality = $data_to;
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

        foreach ($color as $key => $data_to) {
            $data = Offer::where('id', $key)->first();
            if ($data) {
                $data->color = $data_to;
                $data->update();
            }
        }
        foreach ($color_for_dice as $key => $data_to) {
            $data = Offer::where('id', $key)->first();
            if ($data) {
                $data->color_for_dice = $data_to;
                $data->update();
            }
        }

        foreach ($display as $key => $data_to) {
            $data = Offer::where('id', $key)->first();
            if ($data) {
                if ($data_to == 1) {
                    $data->display = 1;
                } else
                    $data->display = NULL;
                $data->update();
            }
        }

//делаем не активными все витрины
        $activeoff = show_case::whereNotNull('active')->get();
        foreach ($activeoff as $activeof) {
            $activeof->active = NULL;
            $activeof->update();
        }
   
        // делаем активной только 1 витрину
        if (!empty($active)) {
            foreach ($active as $key => $data_to) {
                $data = show_case::where('id', $key)->first();
                if ($data) {
                    $data->active = 1;
                    $data->update();
                }
            }
        }


        return redirect()->route('admin.showcase.index');
    }
}
