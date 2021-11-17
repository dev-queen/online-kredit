<?php

namespace App\Http\Controllers\Admin\Showcase;

use App\Http\Controllers\Controller;
use App\Models\show_case;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('admin.showcases.create');
    }
}
