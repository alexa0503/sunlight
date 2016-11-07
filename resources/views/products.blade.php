@extends('layout')
@section('content')
<div class="rows">
    @foreach ($rows as $row )
    <div class="products"><a href="#" data-url="{{$row->description}}"><img src="{{asset($row->image)}}"/></a></div>
    @endforeach
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
$().ready(function(){
    $('.products').height(h);
    $('button.close').click(function(){
        $('.pop-bkg').hide();
        return false;
    })
    $('.products a').click(function(){
        var url = $(this).attr('data-url');
        $('.pop-content h2').text(url);
        $('.pop-bkg').show();
        return false;
    })
});
</script>
@endsection
