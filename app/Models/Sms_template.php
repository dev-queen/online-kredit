<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sms_template extends Model
{
    use HasFactory;
    
    protected $table = 'sms_templates';
    protected $guarded =false;
}
