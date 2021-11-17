<?php

namespace App\Http\Controllers\Admin\LetterName;

use App\Http\Controllers\Controller;
use App\Models\LetterName;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\LetterName\StoreRequest;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        if (isset($data['active']) && $data['active'] == 'on') {
            $data['active'] = 1;
        }

        LetterName::create($data);

        return redirect()->route('admin.letter-name.index');
    }
}
