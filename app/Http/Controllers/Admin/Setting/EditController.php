<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Setting $setting)
    {
        $setting=Setting::first();
        return view('admin.settings.edit', compact('setting'));
    }
}
