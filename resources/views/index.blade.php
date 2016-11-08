@extends('layout')
@section('content')
<div class="rows" id="page-index">
    <ul class="bxslider">
        @foreach ($rows[0] as $row)
        <li><img src="{{asset($row->image)}}" width="{{$row->image_width}}" height="{{$row->image_height}}" /></li>
        @endforeach
    </ul>
</div>
<div class="rows" id="page-about">
    @foreach ($rows[1] as $row)
    <div><img src="{{asset($row->image)}}" width="{{$row->image_width}}" height="{{$row->image_height}}" /></div>
    @endforeach
</div>
<div class="rows" id="page-products">
    @foreach ($rows[2] as $row )
    <div class="products"><img src="{{asset($row->image)}}" width="{{$row->image_width}}" height="{{$row->image_height}}" /><div class="products-button"><a href="#" data-url="{{$row->description}}"><img src="{{asset('assets/images/spacer.gif')}}" width="200" height="60" /></a></div></div>
    @endforeach
</div>
<div class="rows" id="page-article">
    <div class="nav-article"><img src="{{asset('assets/images/nav-article.png')}}"/></div>
    <div class="content-article">
        @foreach ($rows[3] as $row )
        <div class="image-article"><a href="{{url('post',['id'=>$row->id])}}"><img src="{{asset($row->image)}}" width="{{$row->image_width}}" height="{{$row->image_height}}" /></a><div class="description"><h3>{{date('Y-m-d',strtotime($row->created_at))}}</h3><h1>{{$row->title}}</h1><h2>{{$row->description}}</h2></div></div>
        @endforeach
        <div class="text-center" style="margin:60px 0;"><a href="javascript:;"><img src="{{asset('assets/images/btn-01.png')}}"/></a></div>
    </div>
</div>
<div class="pop-bkg">
    <div class="pop-content">
        <h2></h2>
        <div class="text-center">
            复制上方链接，<br/>既可打开淘宝购买
        </div>
        <button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
    </div>
</div>
@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $('.bxslider').bxSlider({
        auto: true,
        controls:false,
        responsive:true
    });
    //$('.products').height(h);
    $('button.close').click(function(){
        $('.pop-bkg').hide();
        return false;
    })
    $('.products a').on('click',function(){
        var url = $(this).attr('data-url');
        $('.pop-content h2').text(url);
        $('.pop-bkg').show();
        return false;
    })
});
</script>
@endsection
