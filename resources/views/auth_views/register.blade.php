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

        <form action="{{url('register')}}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="form-group">

              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" placeholder="name">

            </div>
            <div class="form-group">

              <input type="text" class="form-control" id="exampleInputPassword1" name="email" placeholder="email">
            </div>
            <div class="form-group">

                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="password">
              </div>
              <div class="form-group">

                <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirmation" placeholder="password confirm">
              </div>


            <button type="submit" class="btn btn-primary">Register</button>
          </form>

    </div>
@endsection
