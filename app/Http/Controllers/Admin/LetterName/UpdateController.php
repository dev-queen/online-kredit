<?php

namespace App\Http\Controllers\Admin\LetterName;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LetterName;
use App\Http\Requests\Admin\LetterName\UpdateRequest;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, LetterName $letter_name)
    {
        $data = $request->validated();

        if (isset($data['active']) && $data['active'] == 'on') {
            $data['active'] = 1;
        } else
            $data['active'] = null;

        $letter_name->update($data);

        return redirect()->route('admin.letter-name.index');
    }
}
