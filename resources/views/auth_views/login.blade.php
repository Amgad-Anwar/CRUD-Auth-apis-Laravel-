@extends('layout')

@section('title')
    register
@endsection

@section('content')
    <div class="container mt-5">


            @if ($errors->any())
            <div class="btn-danger">
             @foreach ($errors->all() as $error )
                {{ $error }} <br>
             @endforeach
            </div>
            @endif


        <h1 class="pt-5"> Register</h1>

        <form action="{{url('login')}}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="form-group">

              <input type="text" class="form-control" id="exampleInputPassword1" name="email" placeholder="email">
            </div>
            <div class="form-group">

                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="password">
              </div>


            <button type="submit" class="btn btn-primary">login</button>
          </form>

    </div>
@endsection
