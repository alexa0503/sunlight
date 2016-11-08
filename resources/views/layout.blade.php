<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="shortcut icon" href="{{asset('/assets/favicon.ico')}}"/>
<link rel="bookmark" href="{{asset('/assets/favicon.ico')}}"/>
<meta name="viewport" content="width=640,initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no,target-densitydpi=device-dpi"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{env("PAGE_TITLE")}}</title>
<link rel="stylesheet" href="{{asset('/assets/css/bootstrap.css')}}">
<link rel="stylesheet" href="{{asset('/assets/css/jquery.bxslider.css')}}">
<link rel="stylesheet" href="{{asset('/assets/css/common.css')}}">
<script src="{{asset('/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/assets/js/jquery.bxslider.min.js')}}"></script>
<script src="{{asset('/assets/js/common.js')}}"></script>

<!--移动端版本兼容 -->
    <script type="text/javascript">
    var phoneWidth =  parseInt(window.screen.width);
    var phoneScale = phoneWidth/640;
    var ua = navigator.userAgent;
    if (/Android (\d+\.\d+)/.test(ua)){
        var version = parseFloat(RegExp.$1);
        if(version>2.3){
            document.write('<meta name="viewport" content="width=640, initial-scale=1,minimum-scale = '+phoneScale+', maximum-scale = '+phoneScale+', target-densitydpi=device-dpi">');
        }else{
            document.write('<meta name="viewport" content="width=640, target-densitydpi=device-dpi">');
        }
    }
    </script>
    <!--移动端版本兼容 end -->
<script>
var h = $(window).height();
$(document).ready(function(){
    var arr = location.href.split('#');
    if( arr[1] ){
        $("html,body").animate({scrollTop: $("#page-"+arr[1]).offset().top}, 0);
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
        var string = $(this).attr('href').replace('/#','');
        if( string && $("#page-"+string).offset()){
            $("html,body").animate({scrollTop: $("#page-"+string).offset().top}, 0);
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
            <li style="padding:0 0 50px 0;"><a href="/#index"><img src="{{asset('assets/images/logo.png')}}" /></a></li>
            <li class="active" style="padding:25px 0;"><a href="/#index" data-toggle="collapse" data-target="#bs-navbar-collapse"><img src="{{asset('assets/images/nav-menu-01.png')}}" /></a></li>
            <li style="padding:25px 0;"><a href="/#about" data-toggle="collapse" data-target="#bs-navbar-collapse"><img src="{{asset('assets/images/nav-menu-02.png')}}" /></a></li>
            <li style="padding:25px 0;"><a href="/#products" data-toggle="collapse" data-target="#bs-navbar-collapse"><img src="{{asset('assets/images/nav-menu-03.png')}}" /></a></li>
            <li style="padding:25px 0;"><a href="/#article" data-toggle="collapse" data-target="#bs-navbar-collapse"><img src="{{asset('assets/images/nav-menu-04.png')}}" /></a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right" id="navbar-sns">
              <li><a href=""><img src="{{asset('assets/images/icon-wechat.png')}}"/></a></li>
              <li><img src="{{asset('assets/images/icon-divider.jpg')}}"/></li>
              <li><a href=""><img src="{{asset('assets/images/icon-weibo.png')}}"/></a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <div id="main-content">
    @yield('content')
    </div>
    @yield('scripts')
</body>
</html>
