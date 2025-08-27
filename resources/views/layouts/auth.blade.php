<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>Home</title>
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        @vite(['resources/js/tm.js', 'resources/css/tm.css'])
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet" />
    </head>

    <body>
        <div class="login-content">
            @yield('content')
        </div>

        <div class="footer-copyright-area" style="position: fixed; width: 100%; bottom: 0; text-align: center">
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
