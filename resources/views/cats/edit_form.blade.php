@extends('layout')

@section('title')
    edit Category
@endsection

@section('content')
    <div class="container">
        <h1 class="pt-5"> edit Category</h1>

        <form action="{{url("edit/$cat->id")}}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="form-group">

              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{$cat->name}}" placeholder="name">

            </div>
            <div class="form-group">

              <input type="text" class="form-control" id="exampleInputPassword1" name="desc" value="{{$cat->desc}}" placeholder="desc">
            </div>

            <div class="form-group">

                <input type="file" name="img" class="form-control" id="exampleInputPassword1" >
              </div>

              <img src="{{asset("uploads/$cat->img")}}" height="100px" alt="">

            <button type="submit" class="btn btn-primary">edit</button>
            <a href="{{url('/cats')}}" class="btn btn-dark"> back</a>

          </form>

    </div>
@endsection
