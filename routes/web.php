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
Route::get('/', function(){
    return redirect('/h5/index.html');
});
Route::get('index', function () {
    $rows[0] = \App\Page::where('type_id', 1)->orderBy('sort_id', 'ASC')
        ->get()
        ->map(function($item, $value){
        $img_size = @getimagesize(public_path($item->image));
        $item->image_height = $img_size[1];
        $item->image_width = $img_size[0];
        return $item;
    });
    $rows[1] = \App\Page::where('type_id', 2)->orderBy('sort_id', 'ASC')
        ->get()
        ->map(function($item, $value){
            $img_size = @getimagesize(public_path($item->image));
            $item->image_height = $img_size[1];
            $item->image_width = $img_size[0];
            return $item;
        });
    $rows[2] = \App\Page::where('type_id', 3)->orderBy('sort_id', 'ASC')
        ->get()
        ->map(function($item, $value){
            $img_size = @getimagesize(public_path($item->image));
            $item->image_height = $img_size[1];
            $item->image_width = $img_size[0];
            return $item;
        });
    $rows[3] = \App\Page::where('type_id', 4)->orderBy('sort_id', 'ASC')
        ->limit(4)
        ->get()
        ->map(function($item, $value){
            $img_size = @getimagesize(public_path($item->image));
            $item->image_height = $img_size[1];
            $item->image_width = $img_size[0];
            return $item;
        });
    return view('index', ['rows'=>$rows]);
});
Route::get('post/{id}', function($id){
    $row = \App\Page::find($id);
    if( null == $row || $row->type_id != 4 ){
        return redirect('/');
    }
    return view('post', ['row'=>$row]);
});

Route::get('wx/share', function(){
    $url = urldecode(Request::get('url'));

    $options = [
      'app_id' => env('WECHAT_APPID'),
      'secret' => env('WECHAT_SECRET'),
      'token' => env('WECHAT_TOKEN')
    ];
    $wx = new EasyWeChat\Foundation\Application($options);
    $js = $wx->js;
    $js->setUrl($url);
    $config = json_decode($js->config(array('onMenuShareTimeline', 'onMenuShareAppMessage', 'onMenuShareQQ'), false), true);
    $share = [
      'title' => env('WECHAT_TITLE'),
      'desc' => env('WECHAT_DESC'),
      'imgUrl' => asset(env('WECHAT_SHARE_IMG')),
      'link' => url('/'),
    ];
    return response()
        ->json(array_merge($share, $config))
        ->withHeaders([
            'Access-Control-Allow-Origin:*',
        ]);
});


Route::group(['prefix' => 'admin','namespace' => 'Admin'],function ($router)
{
    $router->get('login', 'LoginController@showLoginForm')->name('admin.login');
    $router->post('login', 'LoginController@login');
    $router->get('logout', 'LoginController@logout');
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
