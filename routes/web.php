<?php

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

Route::get('/', function () {
    $rows[0] = \App\Page::where('type_id', 1)->orderBy('sort_id', 'ASC')->get();
    $rows[1] = \App\Page::where('type_id', 2)->orderBy('sort_id', 'ASC')->get();
    $rows[2] = \App\Page::where('type_id', 3)->orderBy('sort_id', 'ASC')->get();
    $rows[3] = \App\Page::where('type_id', 4)->orderBy('sort_id', 'ASC')->get();
    return view('index', ['rows'=>$rows]);
});
Route::get('post/{id}', function($id){
    $row = \App\Page::find($id);
    return view('post', ['row'=>$row]);
});




Route::group(['prefix' => 'admin','namespace' => 'Admin'],function ($router)
{
    $router->get('login', 'LoginController@showLoginForm')->name('admin.login');
    $router->post('login', 'LoginController@login');
    $router->post('logout', 'LoginController@logout');
    /*
    Route::get('/login', 'Admin\AuthController@getLogin');
    Route::post('/login', 'Admin\AuthController@postLogin');
    Route::any('/logout', function(){
        Auth::guard('admin')->logout();
        return redirect('/login');
    });
    */



    Route::group(['middleware' => ['auth.admin:admin','menu']], function () {
        Route::get('/', 'IndexController@index')->name('admin_dashboard');
        Route::resource('type.page', 'PageController');

        Route::get('users', 'IndexController@users');
        Route::get('account', 'IndexController@account');
        Route::post('account', 'IndexController@accountPost');
    });
    //初始化后台帐号
    Route::get('install', function () {
        if (0 == \App\Admin::count()) {
            $user = new \App\Admin();
            $user->name = 'admin';
            $user->email = 'admin@admin.com';
            $user->password = bcrypt('admin@2016');
            $user->save();
        }
        return redirect('admin/login');
    });
});
