@extends('layout')
@section('content')
<div class="rows">
    <ul class="bxslider">
        <li><img src="{{asset('assets/images/index-slider-01.png')}}"/></li>
        <li><img src="{{asset('assets/images/index-slider-01.png')}}"/></li>
        <li><img src="{{asset('assets/images/index-slider-01.png')}}"/></li>
        <li><img src="{{asset('assets/images/index-slider-01.png')}}"/></li>
    </ul>
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
});
</script>
@endsection
