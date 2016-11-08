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
            $homepage->add('查看', ['url'=>route('type.page.index',['type'=>1])]);
            $homepage->add('添加', ['url'=>route('type.page.create',['type'=>1])]);
            $about = $menu->add('品牌历史','#');
            $about->add('查看', ['url'=>route('type.page.index',['type'=>2])]);
            $about->add('添加', ['url'=>route('type.page.create',['type'=>2])]);
            $products = $menu->add('产品手册','#');
            $products->add('查看', ['url'=>route('type.page.index',['type'=>3])]);
            $products->add('添加', ['url'=>route('type.page.create',['type'=>3])]);
            $article = $menu->add('阳光秘籍','#');
            $article->add('查看', ['url'=>route('type.page.index',['type'=>4])]);
            $article->add('添加', ['url'=>route('type.page.create',['type'=>4])]);
            //$page->add('查看', 'page/view')->divide();
            //$menu->add('账户',['route'=>'admin_account']);
        });
        return $next($request);
    }
}
