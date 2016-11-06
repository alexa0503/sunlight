<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="shortcut icon" href="{{asset('/assets/favicon.ico')}}"/>
<link rel="bookmark" href="{{asset('/assets/favicon.ico')}}"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{env("PAGE_TITLE")}}</title>
<link rel="stylesheet" href="{{asset('/assets/css/bootstrap.css')}}">
<link rel="stylesheet" href="{{asset('/assets/css/common.css')}}">
<script src="{{asset('/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/assets/js/common.js')}}"></script>
<script>
$().ready(function(){
    var h = $(document).height();
    $('#collapse').height(h);
    $('#collapse').on('show.bs.collapse', function() {
        $('.navbar-default').css('background-color','#FFF');
    }).on('hide.bs.collapse', function(){
        $('.navbar-default').css('background-color','transparent');
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
            <li style="padding:0 0 50px 0;"><a href="#"><img src="{{asset('assets/images/logo.png')}}" /></a></li>
            <li class="active" style="padding:25px 0;"><a href="{{url('/')}}"><img src="{{asset('assets/images/nav-menu-01.png')}}" /></a></li>
            <li style="padding:25px 0;"><a href="{{url('about')}}"><img src="{{asset('assets/images/nav-menu-02.png')}}" /></a></li>
            <li style="padding:25px 0;"><a href="{{url('products')}}"><img src="{{asset('assets/images/nav-menu-03.png')}}" /></a></li>
            <li style="padding:25px 0;"><a href="{{url('article')}}"><img src="{{asset('assets/images/nav-menu-04.png')}}" /></a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right" id="navbar-sns">
              <li><a href=""><img src="{{asset('assets/images/icon-wechat.png')}}"/></a></li>
              <li><img src="{{asset('assets/images/icon-divider.png')}}"/></li>
              <li><a href=""><img src="{{asset('assets/images/icon-weibo.png')}}"/></a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    @yield('content')
    @yield('scripts')
</body>
</html>
