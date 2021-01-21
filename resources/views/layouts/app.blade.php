<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="background-color: white">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Laravel') }}
                    --}}
                    Globex
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth
                        <ul class="navbar-nav mr-auto">
                            @if (Auth::user()->isStaff() && Auth::user()->isAdmin())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.individual.index') }}">All Event List</a>
                                </li>
                            @endif

                            @if (Auth::user()->isLecturer())
                                @if (Auth::user()->isAdmin())
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            Event List
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                            @auth
                                                <a class="dropdown-item" href="{{ route('lecturer.event.index') }}">
                                                    My Events
                                                </a>
                                                <a class="dropdown-item" href="{{ route('admin.individual.index') }}">
                                                    All Events List
                                                </a>
                                            @endauth
                                        </div>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('lecturer.event.index') }}">Event List</a>
                                    </li>
                                @endif
                            @endif

                            @if (Auth::user()->isStudent())
                                @if (Auth::user()->isAdmin())
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            Event List
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                            @auth
                                                <a class="dropdown-item" href="{{ route('student.event.index') }}">
                                                    My Events
                                                </a>
                                                <a class="dropdown-item" href="{{ route('admin.individual.index') }}">
                                                    All Events List
                                                </a>
                                            @endauth
                                        </div>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('student.event.index') }}">Event List</a>
                                    </li>
                                @endif
                            @endif

                            @if (Auth::user()->isAdmin())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.student.index') }}">User List</a>
                                </li>
                            @endif

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('help') }}">Help</a>
                            </li>
                        </ul>
                    @endauth

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @auth
                                        @if (Auth::user()->isAdmin())
                                            Admin (
                                            @if (Auth::user()->isStaff())
                                                {{ Auth::user()->staff->staff_name }} )
                                            @endif
                                            @if (Auth::user()->isLecturer())
                                                {{ Auth::user()->lecturer->lecturer_name }} )
                                            @endif
                                            @if (Auth::user()->isStudent())
                                                {{ Auth::user()->student->student_name }} )
                                            @endif
                                        @else
                                            @if (Auth::user()->isStaff())
                                                Staff (
                                                {{ Auth::user()->staff->staff_name }} )
                                            @endif
                                            @if (Auth::user()->isLecturer())
                                            Lecturer (
                                                {{ Auth::user()->lecturer->lecturer_name }} )
                                            @endif
                                            @if (Auth::user()->isStudent())
                                            Student (
                                                {{ Auth::user()->student->student_name }} )
                                            @endif
                                        @endif
                                    @endauth
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @auth
                                        @if (Auth::user()->isStaff())
                                            <a class="dropdown-item" href="{{ route('staff.user.show', Auth::id()) }}">
                                                Profile
                                            </a>
                                        @endif

                                        @if (Auth::user()->isLecturer())
                                            <a class="dropdown-item" href="{{ route('lecturer.user.show', Auth::id()) }}">
                                                Profile
                                            </a>
                                        @endif

                                        @if (Auth::user()->isStudent())
                                            <a class="dropdown-item" href="{{ route('student.user.show', Auth::id()) }}">
                                                Profile
                                            </a>
                                        @endif
                                    @endauth

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
