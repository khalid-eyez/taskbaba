<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>Task Box</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet" />
        @vite(['resources/js/tm.js', 'resources/css/tm.css'])
    </head>

    <body>
        <div class="header-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="logo-area">
                            <a href="#">
                                <img
                                    src="{{ asset('/build/assets/logo-CJBxqNOP.png') }}"
                                    style="height: 30px"
                                    alt=""
                                />
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="header-top-menu">
                            <ul class="nav navbar-nav notika-top-nav">
                                <li class="nav-item">
                                    <a href="{{ route('logout') }}" class="nav-link">
                                        <span>
                                            <i
                                                class="fa fa-sign-out custom-tooltip"
                                                style="font-size: 25px"
                                                data-placement="right"
                                                data-toggle="tooltip"
                                                data-title="Logout"
                                            ></i>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            window.flash =
                {{
                    Js::from([
                        'success' => session('success'),
                        'error' => session('error'),
                        'info' => session('info'),
                        'warning' => session('warning'),
                    ])
                }};
        </script>
        <script>
            //toastr.info("available here too");
                @foreach (['success', 'info', 'warning', 'error'] as $msg)
                @if(session($msg))
                toastr.{{ $msg }}("{{ session($msg) }}");

                @endif
                @endforeach
        </script>
        <div class="form-element-area mg-t-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div
                            class="add-todo-list notika-shadow mg-t-30"
                            style="display: flex; justify-content: center; align-items: center"
                        >
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright-area" style="position: fixed; width: 100%; bottom: 0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer-copy-right">
                            <p>
                                Copyright © 2025 TASKBABA
                                <a href="https://khalid-eyez.github.io/" style="float: right">Developed by Khalid</a>
                                .
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
