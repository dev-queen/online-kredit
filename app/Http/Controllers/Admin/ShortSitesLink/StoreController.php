<?php

namespace App\Http\Controllers\Admin\ShortSitesLink;

use App\Http\Controllers\Controller;
use App\Models\ShortSitesLink;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ShortSitesLink\StoreRequest;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        if (isset($data['active']) && $data['active'] == 'on') {
            $data['active'] = 1;
        }

        ShortSitesLink::create($data);

        return redirect()->route('admin.short-sites-link.index');
    }
}
