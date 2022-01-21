<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <link rel="stylesheet" href="{{url('css/app.css')}}">
    <link rel="stylesheet" href="{{url('css/userSideNavBarStyle.css')}}">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://use.fontawesome.com/10376d63f8.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <!-- Styles -->
    @livewireStyles
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>

<body style="background: #F1F2F3;">
    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li>
                            <a href="#"></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                <i class="far fa-bell"></i>
                                <span class="badge badge-light" style="background: grey;">
                                    {{auth()->user()->notifications->where('type', 'App\Notifications\AdminApprovedReservation') -> count()}}
                                </span>
                            </a>
                            <ul class="dropdown-menu" style="padding: 0;margin:0;list-style: none;width:15em;min-width:100%;z-index:99;position:absolute;overflow:visible;">
                                @foreach(auth()->user()->notifications as $notification)
                                <li class="list-group-item list-group-item-success">{{$notification->data['message']}}</li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="dropdown ml-4">
                            <a href="#" class="dropdown" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                <i class="fas fa-envelope-open-text"></i>
                                <span class="badge badge-light" style="background: grey;">
                                    {{auth()->user()->notifications ->where('type', 'App\Notifications\AdminAnsweredLetter') -> count()}}
                                </span>
                            </a>
                            <ul class="dropdown-menu" style="padding: 0;margin:0;list-style: none;width:15em;min-width:100%;z-index:99;position:absolute;overflow:visible;">
                                @foreach(auth()->user()->notifications as $notification)
                                @if($notification -> type == "App\Notifications\AdminAnsweredLetter")
                                <li class="list-group-item list-group-item-success">{{$notification->data['message']}}</li>
                                @endif
                                @endforeach
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="drawer_container" style="display: flex; min-height: 100vh;">
            <div class="navigation">
                <ul>
                    <li style="margin-top: 15px;">
                        <a href="#">
                            <span class="icon">
                                <i class="fas fa-home"></i>
                            </span>
                            <span class="title">Home</span>
                        </a>
                    </li>
                    <li style="margin-top: 48px;">
                        <a href="{{route('vehicles_list')}}">
                            <span class="icon">
                                <i class="fas fa-car-side"></i>

                            </span>

                            <span class="title">Vehicles</span>
                        </a>
                    </li>
                    <li style="margin-top: 48px;">
                        <a href="{{route('user.showReservations')}}">
                            <span class="icon">
                                <i class="fas fa-clipboard-list"></i>
                            </span>

                            <span class="title">My Reservations</span>
                        </a>
                    </li>
                    <li style="margin-top: 48px;">
                        <a href="{{route('user.showContact')}}">
                            <span class="icon">
                                <i class="fas fa-file-signature"></i>
                            </span>

                            <span class="title">Contact</span>
                        </a>
                    </li>
                    @guest
                    @if (Route::has('login'))
                    <li style="margin-top: 48px;">
                        <a href="#">
                            <span class="icon">
                                <i class="fas fa-sign-in-alt"></i>
                            </span>

                            <span class="title">Login</span>
                        </a>
                    </li>
                    @endif
                    @else
                    <li style="margin-top: 48px;">
                        <a href="#">
                            <span class="icon">
                                <i class="fas fa-sign-out-alt"></i>
                            </span>
                            <span class="title">Logout</span>
                        </a>
                    </li>
                    @endguest
                    <li style="margin-top: 48px;">
                        <a href="#">
                            <span class="icon">
                                <i class="fas fa-copyright"></i>
                            </span>

                            <span class="title">copyright</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="toggle" onclick="this.classList.toggle('active');
        const navigation = document.querySelector('.navigation');
        navigation.classList.toggle('active');
        ">
            </div>



</body>
@livewireScripts
@stack('scripts')

</html>
