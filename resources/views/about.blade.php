@extends('layout')
@section('content')
<div class="rows">
    @foreach ($rows as $row)
    <div><img src="{{asset($row->image)}}"/></div>
    @endforeach
</div>

@endsection
@section('scripts')
<script>
$().ready(function(){

});
</script>
@endsection
