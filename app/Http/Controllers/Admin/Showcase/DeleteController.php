<?php

namespace App\Http\Controllers\Admin\Showcase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\show_case;
use App\Http\Requests\Admin\Offer\UpdateRequest;

class DeleteController extends Controller
{
    public function __invoke(show_case $showcase)
    {
        $showcase->delete();
        return redirect()->route('admin.showcase.index');
    }
}
