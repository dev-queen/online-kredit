<?php

namespace App\Http\Controllers\Admin\ShortSitesLink;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShortSitesLink;

class DeleteController extends Controller
{
    public function __invoke(ShortSitesLink $link)
    {
        $link->delete();
        return redirect()->route('admin.short-sites-link.index');
    }
}
