@extends('layout')

@section('title')
    Add Category
@endsection

@section('content')
    <div class="container">
        <h1 class="pt-5"> Add Category</h1>

        <form action="{{url('cat/store')}}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="form-group">

              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" placeholder="name">

            </div>
            <div class="form-group">

              <input type="text" class="form-control" id="exampleInputPassword1" name="desc" placeholder="desc">
            </div>

            <div class="form-group">

                <input type="file" name="img" class="form-control" id="exampleInputPassword1" >
              </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

    </div>
@endsection
