<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title id="title">Login | BabuLyrics</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/login.css" type="text/css">
        <link rel="icon" type="image/x-icon" href="assets/logo.png" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Anek+Devanagari&family=Raleway:wght@100;800&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="login">
            <div class="login-form">
                <h1><span id="logo"><span id="lg-name">Babu</span>Lyrics</span>| Log In</h1>
                <form action="{{ route('accounts.logedin') }}" method="POST">

                    @csrf

                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="{{ old('email') }}" placeholder="ex: info@babusoft.rw">
                    <label for="passw">Password</label>
                    <input type="password" name="password" id="passw" placeholder="Password">
                    @foreach ($errors as $error)
                        <p class="lg-msg">{{ $error }}</p>
                    @endforeach
                    <div class="login-btn">
                        <button id="loginbtn"><span></span>Sign In</button>
                        <a href="{{ route('accounts.register') }}">Doesn't have account Register here!</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>