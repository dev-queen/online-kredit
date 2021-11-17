<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Requests\Admin\Client\UpdateRequest;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Client $client)
    {
        $data = $request->validated();
        $client->update($data);
   
        return redirect()->route('admin.client.index');
    }
}
