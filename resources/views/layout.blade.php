<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="shortcut icon" href="{{asset('/assets/favicon.ico')}}"/>
<link rel="bookmark" href="{{asset('/assets/favicon.ico')}}"/>
<meta name="format-detection" content="telephone=no"/>
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="msapplication-tap-highlight" content="no"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{env("PAGE_TITLE")}}</title>
<link rel="stylesheet" href="{{asset('/assets/css/bootstrap.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('/assets/js/slick/slick.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('/assets/js/slick/slick-theme.css')}}">
<link rel="stylesheet" href="{{asset('/assets/css/common.css')}}">
<script src="{{asset('/assets/js/jquery-2.1.1.min.js')}}"></script>
<script src="{{asset('/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/assets/js/slick/slick.min.js')}}"></script>
<script src="{{asset('/assets/js/common.js')}}"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="{{asset('/assets/js/wx.js')}}"></script>

<!--移动端版本兼容 -->
    <script type="text/javascript">
    var phoneWidth = parseInt(window.screen.width);
        var phoneScale = phoneWidth / 640;
        var ua = navigator.userAgent;
        if (/Android (\d+\.\d+)/.test(ua)) {
            var version = parseFloat(RegExp.$1);
            if (version > 2.3) {
                document.write('<meta name="viewport" content="width=640, minimum-scale = ' + phoneScale + ', maximum-scale = ' + phoneScale + ', target-densitydpi=device-dpi">');
            } else {
                document.write('<meta name="viewport" content="width=640, target-densitydpi=device-dpi">');
            }
        } else {
            document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">');
        }
    </script>
    <!--移动端版本兼容 end -->
<script>
var h = $(window).height();
$(document).ready(function(){
    wxShare({});
    var arr = location.href.split('#');
    if( arr[1] ){
        //$("html,body").animate({scrollTop: $("#page-"+arr[1]).offset().top}, 0);
        location.hash = arr[1];
    }
    $('#collapse').height(50);
    $('#collapse').on('show.bs.collapse', function() {
        $('#collapse').height(h);
        $('.navbar-default').css('background-color','#FFF');
    }).on('hide.bs.collapse', function(){
        $('#collapse').height(50);
        $('.navbar-default').css('background-color','transparent');
    });
    $('.navbar-nav li a').on('click', function(){
        if( $(this).attr('href') != '/index#'){
            var string = $(this).attr('href').replace('/index#','');
            if( string && $("#page-"+string).offset()){
                $("html,body").animate({scrollTop: $("#page-"+string).offset().top}, 0);
            }
        }

    });
});
</script>

</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="collapse">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">
              <img src="{{asset('assets/images/nav-logo.png')}}" />
          </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-navbar-collapse">
          <ul class="nav navbar-nav">
            <li style="padding:0 0 50px 0;"><a href="/index#index" onclick='_czc.push(["_trackEvent","sunlight-H5","菜单-首页"]);'><img src="{{asset('assets/images/logo.png')}}" /></a></li>
            <li class="active" style="padding:25px 0;"><a href="/index#index" data-toggle="collapse" data-target="#bs-navbar-collapse" onclick='_czc.push(["_trackEvent","sunlight-H5","菜单-首页"]);'><img src="{{asset('assets/images/nav-menu-01.png')}}" /></a></li>
            <li style="padding:25px 0;"><a href="/index#about" data-toggle="collapse" data-target="#bs-navbar-collapse" onclick='_czc.push(["_trackEvent","sunlight-H5","菜单-品牌历史"]);'><img src="{{asset('assets/images/nav-menu-02.png')}}" /></a></li>
            <li style="padding:25px 0;"><a href="/index#products" data-toggle="collapse" data-target="#bs-navbar-collapse" onclick='_czc.push(["_trackEvent","sunlight-H5","菜单-产品手册"]);'><img src="{{asset('assets/images/nav-menu-03.png')}}" /></a></li>
            <li style="padding:25px 0;"><a href="/index#article" data-toggle="collapse" data-target="#bs-navbar-collapse" onclick='_czc.push(["_trackEvent","sunlight-H5","菜单-阳光秘籍"]);'><img src="{{asset('assets/images/nav-menu-04.png')}}" /></a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right" id="navbar-sns">
              <li><a href="http://weibo.com/u/5827926293?refer_flag=1001030102_&is_all=1" onclick='_czc.push(["_trackEvent","sunlight-H5","微博"]);'><img src="{{asset('assets/images/icon-weibo.png')}}"/></a></li>
              <li><img src="{{asset('assets/images/icon-divider.jpg')}}"/></li>
              <li><a href="#" onclick="showQR()" onclick='_czc.push(["_trackEvent","sunlight-H5","微博"]);'><img src="{{asset('assets/images/icon-wechat.png')}}"/></a></li>
              <div class="qrcode"><img src="{{asset('assets/images/qrcode.png')}}" /></div>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <div id="main-content">
    @yield('content')
    </div>
    <div class="next-page"><img src="{{asset('assets/images/next.gif')}}" /></div>
    @yield('scripts')
    <div style="display:none;">
    	<script src="https://s11.cnzz.com/z_stat.php?id=1260808784&web_id=1260808784" language="JavaScript"></script>
    </div>
</body>
</html>
