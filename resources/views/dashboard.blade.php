<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>visitor management system in laravel </title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
</head>

<body>
    <h1 class="mt-4 mb-5 text-center">Visitor Management System</h1>
    @guest
        @yield('content')
    @else
        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Umdaa</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggle-icon"></span>
            </button>
            <div class="navbar-nav">
                <div class="nav-item  text-nowrap">
                    <a href="#" class="nav-link px-3">welcome,{{ Auth::user()->email }}</a>
                </div>
            </div>
        </header>

        <div class="container-fluid">
            <div class="row">
                <nav id='sidebarMenu' class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="{{ route('profile') }}">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('logout') }}" class="nav-link">Logout</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        @endguest

</body>
<script src="{{ asset('js/bootstrap.js') }}"></script>

</html>
