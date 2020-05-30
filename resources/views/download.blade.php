<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @auth
        <meta http-equiv="refresh" content="0; url=https://raw.githubusercontent.com/dyjhor93/SoportesElectricaribe/master/app/release/app-release.apk">
        @endauth
        <title>Download SoportApp</title>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
            <div class="title m-b-md">
                    SoportApp
                </div>
            @auth
                <div class="title m-b-md">
                    Downloading SoportApp...
                </div>
            @else
            <div class="links">
                    <a href="{{ route('login') }}">Login 👤</a>
                </div>
            @endauth
                
            
                <div class="links">
                    <a href="/">Back to main</a>
                </div>
            </div>
        </div>
    </body>
</html>