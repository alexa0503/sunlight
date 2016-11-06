@extends('layout')
@section('content')
<div class="rows">
    <div id="carousel-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-generic" data-slide-to="1"></li>
        <li data-target="#carousel-generic" data-slide-to="2"></li>
        <li data-target="#carousel-generic" data-slide-to="3"></li>
      </ol>
      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="{{asset('assets/images/product-01.png')}}"/>
          <div class="carousel-caption">
          </div>
        </div>
        <div class="item">
          <img src="{{asset('assets/images/product-02.png')}}"/>
          <div class="carousel-caption">
          </div>
        </div>
        <div class="item">
          <img src="{{asset('assets/images/product-03.png')}}"/>
          <div class="carousel-caption">
          </div>
        </div>
        <div class="item">
          <img src="{{asset('assets/images/product-04.png')}}"/>
          <div class="carousel-caption">
          </div>
        </div>
      </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
$().ready(function(){

});
</script>
@endsection
