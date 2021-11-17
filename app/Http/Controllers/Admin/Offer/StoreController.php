<?php

namespace App\Http\Controllers\Admin\Offer;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Offer\StoreRequest;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        if (isset($data['logo'])) {
            $data['logo'] = Storage::disk('public')->put('/images', $data['logo']);
        }
        if (isset($data['display']) && $data['display'] == 'on') {
            $data['display'] = 1;
        }

        Offer::create($data);
        return redirect()->route('admin.offer.index');
    }
}
