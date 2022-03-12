@extends('layout')

@section('title')
    show Categories
@endsection

@section('content')
    <div class="container">
      @foreach ($cats as $cat )
      <div>
        <h3>{{$cat->name}}</h3>
        <p>{{$cat->desc}}</p>
        <img src="{{asset("uploads/$cat->img")}}" height="100px" alt="">
        <a class="btn btn-info" href="{{url("/form/edit/$cat->id")}}">edit</a>
        <a class="btn btn-danger" href="{{url("/delete/$cat->id")}}">delete</a>
      </div>
      <hr>
      @endforeach

    </div>
@endsection
