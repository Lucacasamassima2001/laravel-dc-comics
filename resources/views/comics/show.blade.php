@extends('layouts.baselayout')

@section('contents')
<div class="container-big d-flex justyfy-content-center py-3">
  <div class="card" style="width: 300rem;">
    <img style="height: 400px; width:400px" src="{{$comic->thumb}} " class="card-img-top" alt="{{$comic->title}} ">
    <div class="card-body">
      <h5 class="card-title">{{$comic->title}}</h5>
      <p class="card-text">{{$comic->series}}</p>
      <p class="card-text">{{$comic->price}} $</p>
      <p class="card-text">{{$comic->description}}</p>
    </div>
  </div>
</div>

  @endsection
