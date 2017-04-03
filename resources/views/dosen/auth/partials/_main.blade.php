<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <link href="https://fonts.googleapis.com/css?family=Quicksand:400,700" rel="stylesheet"> --}}
        <link rel="stylesheet" href="{{ url('css/app.css') }}">
        <script src="{{ url('js/jquery.js') }}"></script>

        <title>SILAB | @yield('title')</title>
    </head>
    <body>
        <div class="container-fluid nav-container">
            <div class="row">
                <div class="container">
                    <div class="row navigation">
                        <div class="col-md-2 nav-header">
                            <a 
                                href="{{ route('index') }}">
                                SILAB
                            </a>
                        </div>
                        <div class="col-md-3 menu-container">
                            <ul class="menu">
                                <li><a class="login-button" 
                                    href="{{ route('dosen.login') }}">Dosen login</a></li>
                                    
                                <li><a class="login-button" 
                                    href="{{ route('mahasiswa.login') }}">Login</a></li>
                                    
                                <li><a class="register-button" 
                                    href="{{ route('mahasiswa.register') }}">Register</a></li>
                                    
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="row login-form">
                        <div class="col-md-8 col-md-offset-1 form-background-primary">
                            @yield('form')
                        </div>
                    </div>
                    @yield('errors')
                </div>
            </div>
        </div>
    </body>
</html>
