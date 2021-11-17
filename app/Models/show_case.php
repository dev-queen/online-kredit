<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class show_case extends Model
{
    use HasFactory;

    protected $table = 'show_cases';
    protected $guarded =false;
    public $timestamps  =false;
}
