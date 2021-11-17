<?php

namespace App\Http\Controllers\Admin\Showcase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\show_case;


class EditController extends Controller
{
    public function __invoke(show_case $showcase)
    {
        return view('admin.showcases.edit', compact('showcase'));
    }
}
