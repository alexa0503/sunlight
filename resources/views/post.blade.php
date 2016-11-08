@extends('layout')
@section('content')
<div class="rows" id="page-post">
    <img src="{{asset($row->image)}}" />
    <h1>{{$row->title}}</h1>
    <h2>{{$row->description}}</h2>
    <h3>{{date('Y-m-d',strtotime($row->created_at))}}</h3>
    <div class="page-content">{!! $row->content !!}</div>
</div>
@endsection
