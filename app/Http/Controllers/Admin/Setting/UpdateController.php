<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Requests\Admin\Setting\UpdateRequest;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Setting $setting)
    {
        $data = $request->validated();

        $setting->update($data);
     
        return redirect()->route('admin.setting.edit');
    }
}
