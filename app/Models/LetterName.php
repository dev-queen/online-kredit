<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterName extends Model
{
    use HasFactory;
    protected $table = 'letter_names';
    protected $guarded =false;
    public $timestamps  =false;
}
