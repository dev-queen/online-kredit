<?php

namespace App\Http\Controllers\Admin\LetterName;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\LetterName;

class IndexController extends Controller
{
    public function __invoke()
    {
        $letter_names = LetterName::get();

       return view('admin.letter-names.index', compact('letter_names'));
    }
}
