<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/name', function (Request $request) {
    return response()->json(['name' => $request->user()->name]);
});

//Route::prefix('sanctum')->namespace('API')->group(function() {
//    Route::post('register', 'AuthController@register');
//    Route::post('token', 'AuthController@token');
//});

//Route::post('/register', [AuthController::class, 'register']);
//Route::post('/logout', [AuthController::class, 'logout']);
//Route::post('/login', [AuthController::class, 'login']);
// роуты для регистрации и входа пользователей с моб. устройства
Route::post('/connect', [AuthController::class, 'connect']);
Route::get('/getoffers', [AuthController::class, 'getOffers']);
Route::get('/usersetdb', [AuthController::class, 'userSetDb']); //для регистрации пользователя


Route::group(['namespace' => 'Sms'], function () {
    Route::post('/microSmsService', 'MicroSmsServiceController');
    Route::post('/shortUrl', 'ShortUrlController');
});


Route::group(['prefix' => 'api', 'middleware' => ['apiauth:MY_APP']], function () { // note the `MY_APP` that should match the name in your config we changed above
    Route::any('/', function () {
        return 'Welcome!';
    });
});