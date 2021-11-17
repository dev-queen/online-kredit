<?php

namespace App\Http\Controllers\Admin\ShortSitesLink;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('admin.short-sites-links.create');
    }
}
