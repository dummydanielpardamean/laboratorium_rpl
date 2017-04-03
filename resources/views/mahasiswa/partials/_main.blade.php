<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                            href="{{ route('mahasiswa') }}">SILAB</a>
                    </div>
                    <div class="col-md-2 menu-container">
                        <ul class="menu">
                            <li><a class="login-button" 
                                href="{{ route('mahasiswa.logout') }}">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container content">
        <div class="row">
            <div class="col-md-3 sidebar">
                <div class="profile-container">
                    <div class="background-image">
                        <img 
                            src="/images/bigsection.jpg">
                    </div>
                    <div class="profile-picture img-circle">
                        <img 
                            src="{{ url('/images/profile/' . Auth::guard('mahasiswa')->user()->gambar_profile) }}">
                    </div>
                    <div class="profile-info">
                        <span class="name">
                            {{ Auth::guard('mahasiswa')->user()->nama_lengkap }}
                        </span>
                        <span>
                            {{ Auth::guard('mahasiswa')->user()->ProgramStudi->nama_program_studi }} - 
                            {{ Auth::guard('mahasiswa')->user()->angkatan }}
                        </span>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul>
                        <li><a 
                            href="{{ route('mahasiswa') }}">Home</a></li>

                        <li><a 
                            href="{{ route('mahasiswa.praktikkum.index') }}">Jadwal Praktikkum</a></li>

                        <li><a 
                            href="{{ route('mahasiswa.picture') }}">Ganti Gambar Profile</a></li>

                        <li><a 
                            href="{{ route('mahasiswa.password') }}">Ganti Password</a></li>

                        @if( Auth::guard('mahasiswa')->user()->asAsisten()->count() > 0 )
                            <li><a 
                                href="{{ route('asisten.index') }}">Asisten praktikkum</a></li>

                        @endif
                    </ul>
                </div>
            </div>
            @yield('main')
        </div>
    </div>
</body>
</html>
