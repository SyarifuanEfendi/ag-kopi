<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" href="{{ asset('images/logoPinggir.png') }}" type="image/gif" />
        <title> Login </title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body style="background:url({{ asset('images/banner.jpg') }}); text-align: center;">
        <div class="container" style=""><br>
            <div class="row">
                <div class="col-md-4 col-md-offset-4" style="background-color:white;">
                <h2 class="text-center"> Login </h2>
                <hr>
                @if (session('error'))
                    <div class="alert alert-danger">
                        <b>Opps!</b> {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('proses_login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username" required="">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required="">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Log In</button>

                    <hr>
                    <p class="text-center">Belum punya akun? <a href="#">Register</a> sekarang!</p>
                </form>
                </div>
            </div>
        </div>
    </body>
</html>
