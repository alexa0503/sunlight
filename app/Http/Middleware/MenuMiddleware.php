<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Menu;
class MenuMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Menu::make('adminNavbar', function($menu){
            $menu->add('控制面板',['route'=>'admin_dashboard']);
            $homepage = $menu->add('首页管理','#');
            $homepage->add('查看', ['url'=>'admin/pages/1']);
            $homepage->add('添加', ['url'=>'admin/page/1/create']);
            $about = $menu->add('品牌历史','#');
            $about->add('查看', ['url'=>'admin/pages/2']);
            $about->add('添加', ['url'=>'admin/page/2/create']);
            $products = $menu->add('产品手册','#');
            $products->add('查看', ['url'=>'admin/pages/3']);
            $products->add('添加', ['url'=>'admin/page/3/create']);
            $article = $menu->add('阳光秘籍','#');
            $article->add('查看', ['url'=>'admin/pages/4']);
            $article->add('添加', ['url'=>'admin/page/4/create']);
            //$page->add('查看', 'page/view')->divide();
            //$menu->add('账户',['route'=>'admin_account']);
        });
        return $next($request);
    }
}
