@extends('layout')
@section('content')
<div class="rows">
    <div class="nav-article"><img src="{{asset('assets/images/nav-article.png')}}"/></div>
    <div class="content-article">
        <div><img src="{{asset('assets/images/article-01.png')}}"/></div>
        <div><img src="{{asset('assets/images/article-03.png')}}"/></div>
        <div><img src="{{asset('assets/images/article-02.png')}}"/></div>
        <div><img src="{{asset('assets/images/article-04.png')}}"/></div>
        <div class="text-center" style="margin:60px 0;"><a href=""><img src="{{asset('assets/images/btn-01.png')}}"/></a></div>
    </div>
</div>

@endsection
@section('scripts')
<script>
$().ready(function(){

});
</script>
@endsection
