<?php

namespace App\Http\Controllers\Admin\ShortSitesLink;

use App\Http\Controllers\Controller;
use App\Models\ShortSitesLink;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(ShortSitesLink $link)
    {
        return view('admin.short-sites-links.edit', compact('link'));
    }
}
