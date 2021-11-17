<?php

namespace App\Http\Controllers\Admin\LetterName;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LetterName;

class DeleteController extends Controller
{
    public function __invoke(LetterName $letter_name)
    {
        $letter_name->delete();
        return redirect()->route('admin.letter-name.index');
    }
}
