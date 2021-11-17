<?php

namespace App\Http\Controllers\Admin\Showcase;

use App\Http\Controllers\Controller;
use App\Models\show_case;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Showcase\StoreRequest;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        if (isset($data['active'])&&$data['active']== 'on') {
            $data['active'] = 1;
        }

        show_case::create($data);
        return redirect()->route('admin.showcase.index');
    }
}
