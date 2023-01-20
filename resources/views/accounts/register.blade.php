<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title id="title">Lyrics | BabuLyrics</title>
        <link rel="icon" type="image/x-icon" href="assets/logo.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/register.css" type="text/css">
        <link rel="icon" href="images/lb.png" type="image/png">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Anek+Devanagari&family=Raleway:wght@100;800&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="register">
            <div class="register-form">
                <h1><span id="logo"><span id="lg-name">Babu</span>Lyrics</span>| Register</h1>
                <form action="" method="post">
                    <div class="names">
                        <div class="name1 rname">
                            <label for="fname">First Name</label><br>
                            <input type="text" name="firstName" id="fname" placeholder="ex: Alex">
                        </div>
                        <div class="name2 rname">
                            <label for="sname">Second Name</label><br>
                            <input type="text" name="secondName" id="sname" placeholder="ex: NJUGA">
                        </div>
                    </div>
                    <label for="uname">Username</label>
                    <input type="text" name="uname" id="uname" placeholder="username of your choice">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="ex: info@babusoft.rw">
                    <label for="passw">Password</label>
                    <input type="password" name="passw1" id="passw" placeholder="Password">
                    <label for="passw2">Confirm Password</label>
                    <input type="password" name="passw2" id="passw2" placeholder="Password">
                    <p class="lg-msg"></p>
                    <div class="register-btn">
                        <button id="registerbtn"><span></span>Sign In</button>
                        <a href="{{ route('login') }}">Already have an account Login here!</a>
                    </div>
                </form>
            </div>
        </div>
        <script src="js/bk.js"></script>
    </body>
</html>