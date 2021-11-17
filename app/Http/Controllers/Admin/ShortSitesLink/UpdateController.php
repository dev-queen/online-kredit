<?php

namespace App\Http\Controllers\Admin\ShortSitesLink;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShortSitesLink;
use App\Http\Requests\Admin\ShortSitesLink\UpdateRequest;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, ShortSitesLink $link)
    {
        $data = $request->validated();
        if (isset($data['active'])&&$data['active']== 'on') {
            $data['active'] = 1;
        }
        else
            $data['active'] = null;
        $link->update($data);

        return redirect()->route('admin.short-sites-link.index');
    }
}
