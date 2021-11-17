<?php

namespace App\Http\Controllers\Admin\LetterName;

use App\Http\Controllers\Controller;
use App\Models\LetterName;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(LetterName $letter_name)
    {
        return view('admin.letter-names.edit', compact('letter_name'));
    }
}
