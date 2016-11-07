@extends('layout')
@section('content')
<div class="rows">
    <ul class="bxslider">
        @foreach ($rows as $row)
        <li><img src="{{asset($row->image)}}"/></li>
        @endforeach
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
