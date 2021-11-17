<?php

namespace App\Http\Controllers\Admin\Showcase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\show_case;
use App\Http\Requests\Admin\Showcase\UpdateRequest;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, show_case $showcase)
    {
        $data = $request->validated();
        if (isset($data['active'])&&$data['active']== 'on') {
            $data['active'] = 1;
        }
        else
            $data['active'] = null;

        $showcase->update($data);

        $showCases=Show_case::all();

        return redirect()->route('admin.showcase.index');
    }
}
