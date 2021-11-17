<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('admin.main.index');;
    });
    Route::group(['namespace' => 'Client', 'prefix' => 'clients'], function () {
        Route::get('/', 'IndexController')->name('admin.client.index');
        Route::get('/{client}/edit', 'EditController')->name('admin.client.edit');
        Route::patch('/{client}', 'UpdateController')->name('admin.client.update');
    });
    Route::group(['namespace' => 'User', 'prefix' => 'user'], function () {
        Route::get('/', 'IndexController')->name('admin.user.index');
    });
    Route::group(['namespace' => 'Offer', 'prefix' => 'offers'], function () {
        Route::get('/', 'IndexController')->name('admin.offer.index');
        Route::get('/create', 'CreateController')->name('admin.offer.create');
        Route::post('/', 'StoreController')->name('admin.offer.store');
        Route::get('/{offer}/edit', 'EditController')->name('admin.offer.edit');
        Route::patch('/{offer}', 'UpdateController')->name('admin.offer.update');
        Route::patch('/', 'MassUpdateController')->name('admin.offer.massupdate');
        Route::delete('/{offer}', 'DeleteController')->name('admin.offer.delete');
        Route::get('/{showcase}', 'IndexController')->name('admin.offer.offersbyshowcases');
    });
    Route::group(['namespace' => 'Showcase', 'prefix' => 'showcases'], function () {
        Route::get('/', 'IndexController')->name('admin.showcase.index');
        Route::get('/create', 'CreateController')->name('admin.showcase.create');
        Route::post('/', 'StoreController')->name('admin.showcase.store');
        Route::get('/{showcase}/edit', 'EditController')->name('admin.showcase.edit');
        Route::patch('/{showcase}', 'UpdateController')->name('admin.showcase.update');
        Route::patch('/', 'MassUpdateController')->name('admin.showcase.massupdate');
        Route::delete('/{showcase}', 'DeleteController')->name('admin.showcase.delete');
        Route::get('/{showcase}', 'IndexController')->name('admin.showcase.offersbyshowcases');
    });
    Route::group(['namespace' => 'SmsTemplate', 'prefix' => 'sms-template'], function () {
        Route::get('/', 'IndexController')->name('admin.sms-template.index');
        Route::get('/create', 'CreateController')->name('admin.sms-template.create');
        Route::post('/', 'StoreController')->name('admin.sms-template.store');
        Route::get('/{sms_template}/edit', 'EditController')->name('admin.sms-template.edit');
        Route::patch('/{sms_template}', 'UpdateController')->name('admin.sms-template.update');
        Route::delete('/{smstemplate}', 'DeleteController')->name('admin.sms-template.delete');
    });
    Route::group(['namespace' => 'ShortSitesLink', 'prefix' => 'short-sites-link'], function () {
        Route::get('/', 'IndexController')->name('admin.short-sites-link.index');
        Route::get('/create', 'CreateController')->name('admin.short-sites-link.create');
        Route::post('/', 'StoreController')->name('admin.short-sites-link.store');
        Route::get('/{link}/edit', 'EditController')->name('admin.short-sites-link.edit');
        Route::patch('/{link}', 'UpdateController')->name('admin.short-sites-link.update');
        Route::delete('/{link}', 'DeleteController')->name('admin.short-sites-link.delete');
    });
    Route::group(['namespace' => 'Setting', 'prefix' => 'setting'], function () {
        Route::get('/', 'EditController')->name('admin.setting.edit');
        Route::patch('/{setting}', 'UpdateController')->name('admin.setting.update');
    });
    Route::group(['namespace' => 'LetterName', 'prefix' => 'letter-name'], function () {
        Route::get('/', 'IndexController')->name('admin.letter-name.index');
        Route::get('/create', 'CreateController')->name('admin.letter-name.create');
        Route::post('/', 'StoreController')->name('admin.letter-name.store');
        Route::get('/{letter_name}/edit', 'EditController')->name('admin.letter-name.edit');
        Route::patch('/{letter_name}', 'UpdateController')->name('admin.letter-name.update');
        Route::delete('/{letter_name}', 'DeleteController')->name('admin.letter-name.delete');
    });
    Route::group(['namespace' => 'Test', 'prefix' => 'test'], function () {
        Route::get('/', 'IndexController')->name('admin.test.index'); // контроллер для тестов
    });
});
//

Route::group(['namespace' => 'Sms'], function () {
    Route::post('/MicroSmsService', 'MicroSmsServiceController'); //роут для обработки ответа от смс-сервиса
});




Auth::routes();


