<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    @yield('css')

    <title> @yield('title') </title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('cats') }}">Home <span
                            class="sr-only">(current)</span></a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('form/register') }}">register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('form/login') }}">login</a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('logout') }}">logout</a>
                    </li>

                @endauth

            </ul>
        </div>
    </nav>


    @yield('content')



    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    @yield('css')
</body>

</html>
