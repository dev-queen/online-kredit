<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Client $client)
    {

        return view('admin.clients.edit', compact('client'));
    }
}
