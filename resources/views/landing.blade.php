<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/app.css">
    <title>SILAB | Landing Page</title>
</head>
<body class="app" style="overflow-y: hidden">
    <div class="container-fluid nav-container">
        <div class="row">
            <div class="container">
                <div class="row navigation">
                    <div class="col-md-2 nav-header">
                        <a href="">SILAB</a>
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
    <div class="container big-section-container shadow-for-container">
        <div class="row big-section">
            <div class="cover"></div>
            <h1 class="text-section">Sistem Informasi Laboratorium</h1>
            <p class="text-section">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia dolorem, labore. Vel magni, soluta praesentium reprehenderit ratione accusantium repudiandae amet officia
            </p>
        </div>
    </div>
    <div class="container features shadow-for-container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    <div class="col-md-4 each-features">
                        <h3 class="text-center">Easy Access</h3>
                        <span class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio nesciunt facere pariatur ex voluptatibus fugit sit fuga cumque recusandae tempora, minima magni, adipisci incidunt eaque, consequuntur non consequatur voluptate inventore!</span>
                    </div>
                    <div class="col-md-4 each-features">
                        <h3 class="text-center">Connect Each Other</h3>
                        <span class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci ad impedit rerum eligendi illo quasi, hic ut sunt deserunt, assumenda tempore eius laudantium qui debitis incidunt tempora doloribus, repellendus soluta!</span>
                    </div>
                    <div class="col-md-4 each-features">
                        <h3 class="text-center">Organized Event</h3>
                        <span class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta eveniet saepe, libero cum iure itaque molestiae, hic facilis necessitatibus non a impedit ipsa explicabo rerum esse beatae ipsum quae, sapiente.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
