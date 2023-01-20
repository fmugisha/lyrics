<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Contact us | BabuLyrics</title>
        <link rel="icon" type="image/x-icon" href="assets/logo.png" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Anek+Devanagari&family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link href="/css/contact.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    </head>
    <body>
        <nav>
            <a href="{{ route('index') }}" class="b_nav nav_lg">
                <span id="logo">
                    <span id="lg-name">Babu</span>Lyrics
                </span>
            </a>
            <div class="navbar">
                <a href="{{ route('article') }}" class="b_nav">articles</a>
                <span class="b-line">/</span>
                <a href="{{ route('news') }}" class="b_nav">newsletter</a>
                <span class="b-line">/</span>
                <a href="#" class="b_nav">contact us</a>
            </div>
        </nav>
        <section class="container grey-text">
            <h4 class="center">Contact us</h4>
            <form class="white" action="add.php" method="POST" enctype="multipart/form-data">
                <label>Your Name:</label>
                <input type="text" name="title"/>
                <label>Your Email:</label>
                <input type="text" name="email"/>
                <label>Your Message:</label>
                <textarea type="text" name="ingredients"></textarea>
                <div class="center">
                    <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0" />
                </div>
            </form>
        </section>
        <div class="copy center">Copyright &copy;<script>document.write(new Date().getFullYear())</script> BabuLyrics</div>
    </body>
</html>
