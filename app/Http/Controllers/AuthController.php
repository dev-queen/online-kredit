<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Offer;
use App\Models\show_case;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Services\EasySms;


class AuthController extends Controller
{
    public function connect(Request $request)
    {
        $access = $request->all();

        $api_key = env('SECRET_API_KEY');

        if (isset($access['key']) && $access['key'] == $api_key) {
            return 'connect';
        } else {
            return ('access error');
        }
    }

    public function getOffers(Request $request)
    {
        $showcase=show_case::whereNotNull('active')->first();
        $idshowcase=$showcase->id;
        $ofers = DB::table('offers')->where('id_showcase', $idshowcase )->where('display', 1)->orderBy('sort')->get();
        $conection = $this->connect($request);

        if ($conection == 'connect') {
            return response()->json([
                'Offers' => $ofers,
                'showcase'=> $showcase->header
            ], 200);

        } else {
            return ('access error');
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|string|min:8',
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255|nullable',
            'ip' => 'required|string|max:255|nullable'
        ]);
        // проверяем входящий запрос
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        // Смотрим результат валидации. Если ошибка, то возвращаем ошибки в ответе.

        $input = $request->all();

        $user = Client::where('phone', $request->phone)->first();

        if ($user !== null) {
            $user->update([
                'name' => request('name'),
                'last_name' => request('last_name'),
                'middle_name' => request('middle_name'),
                'ip' => request('ip'),
            ]);
        } else {
            $user = Client::create($input);
            EasySms::sendEventRegistration($request->phone, $user->id);
        }
        
        $token = $user->createToken($request->phone)->plainTextToken;
        // Создаем токен и сохраняем его, чтобы его можно было вернуть в ответе
//        return response()->json([
//            'token' => $token,
//        ], 200);
    }

    public function userSetDb(Request $request)
    {
        $conection = $this->connect($request);

        if ($conection == 'connect') {
            return $this->register($request);
        } else {
            return ('access error');
        }
    }

}
