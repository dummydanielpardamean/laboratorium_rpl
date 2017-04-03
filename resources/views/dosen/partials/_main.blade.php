<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="https://fonts.googleapis.com/css?family=Quicksand:400,700" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <script src="{{ url('js/jquery.js') }}"></script>
    @yield('styles')
    <title>SILAB | @yield('title')</title>
</head>
<body>
    <div class="container-fluid nav-container">
        <div class="row">
            <div class="container">
                <div class="row navigation">
                    <div class="col-md-2 nav-header">
                        <a 
                            href="{{ route('dosen.home') }}">
                            SILAB
                        </a>
                    </div>
                    <div class="col-md-2 menu-container">
                        <ul class="menu">
                            <li><a class="login-button" 
                                href="{{ route('dosen.logout') }}">Logout</a></li>
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
                            src="/images/bigsection.jpg" alt="">
                    </div>
                    <div class="profile-picture img-circle">
                        <img 
                            src="{{ url('/images/profile/' . Auth::guard('dosen')->user()->gambar_profile) }}">
                    </div>
                    <div class="profile-info">
                        <span class="name">
                            {{ Auth::guard('dosen')->user()->nama_lengkap }}
                        </span>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul>
                        <li><a 
                            href="{{ route('dosen.home') }}">Home</a></li>

                        @if(\Auth::guard('dosen')->user()->hak_akses === 'admin')
                            <li><a 
                                href="{{ route('dosen.password') }}">Ganti Password</a></li>

                            <li><a 
                                href="{{ route('admin.dosen.index') }}">Daftar List Dosen</a></li>

                            <li><a 
                                href="{{ route('admin.mahasiswa.index') }}">Daftar List Mahasiswa</a></li>

                        @else
                            <li><a 
                                href="{{ route('dosen.password') }}">Ganti Password</a></li>
                                
                            <li><a 
                                href="{{ route('dosen.picture') }}">Ganti Gambar Profile</a></li>
                                
                            <li><a 
                                href="{{ route('dosen.praktikkum.create') }}">Buat Jadwal Praktikkum</a></li>
                                
                            <li><a 
                                href="{{ route('dosen.praktikkum.index') }}">Lihat Jadwal Praktikkum</a></li>
                                
                        @endif

                    </ul>
                </div>
            </div>
            @yield('main')
        </div>
    </div>
    @yield('scripts')
</body>
</html>
