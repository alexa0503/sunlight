@extends('layout')
@section('content')
<div class="rows">
    <div class="products"><a href="#"><img src="{{asset('assets/images/product-01.jpg')}}"/></a></div>
    <div class="products"><a href="#"><img src="{{asset('assets/images/product-02.jpg')}}"/></a></div>
    <div class="products"><a href="#"><img src="{{asset('assets/images/product-03.jpg')}}"/></a></div>
    <div class="products"><a href="#"><img src="{{asset('assets/images/product-04.jpg')}}"/></a></div>
</div>
<div class="pop-bkg">
    <div class="pop-content">
        <h2>http://sunlight.dev/products</h2>
        <div class="text-center">
            复制上方链接，<br/>既可打开淘宝购买
        </div>
        <button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
    </div>
</div>

@endsection
@section('scripts')
<script>
$().ready(function(){
    $('.products').height(h);
    $('button.close').click(function(){
        $('.pop-bkg').hide();
        return false;
    })
    $('.products').click(function(){
        $('.pop-bkg').show();
        return false;
    })
});
</script>
@endsection
