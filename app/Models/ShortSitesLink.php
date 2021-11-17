<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortSitesLink extends Model
{
    use HasFactory;

    protected $table = 'short_sites_links';
    protected $guarded =false;
    public $timestamps  =false;
}
