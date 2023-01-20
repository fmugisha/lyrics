<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title id="title">Add Newsletter | BabuLyrics</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/addnewsletter.css" type="text/css">
        <link rel="icon" type="image/x-icon" href="/assets/logo.png" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Anek+Devanagari&family=Raleway:wght@100;800&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="navbar">
            <div class="logo">
                <span id="logo">
                    <span id="lg-name">Babu</span>Lyrics
                </span>
            </div>
            <div>
                <hr class="hrline">
            </div>
            <div class="h-site">
                <a href="{{ route('index') }}">View site</a>
            </div>
            <ul>
                <li><a href="{{ route('admin') }}">Dashboard</a></li>
                <hr class="hrline navline">
                <li><a href="{{ route('songs.song') }}">Songs</a></li>
                <hr class="hrline navline">
                <li><a href="{{ route('articles.lyrics') }}">Articles</a></li>
                <hr class="hrline navline">
                <li><a href="{{ route('newsletters.newsletter') }}">Newsletter</a></li>
                <hr class="hrline navline">
                <li><a href="#">Messages</a></li>
                <hr class="hrline navline">
                <li><a href="{{ route('accounts.user') }}">Users</a></li>
                <hr class="hrline navline">
                <li><a href="#">Logout</a></li>
            </ul>
            <div class="user">
                <p class="user-title">Logged In By:</p>
                <p class="user-name">Mugisha Fred</p>
            </div>
            <div class="footer">Copyright 
                &copy;<script>document.write(new Date().getFullYear())</script>. BabuLyrics
            </div>
        </div>
        <div class="bg-admin">
            <div class="container bk-form">
                <a href="{{ route('newsletters.newsletter') }}" class="bk-btn" id="bk-id">&times;</a>
                <h1>Add Article</h1>
                <form enctype="multipart/form-data" action="{{ route('newsletters.addnewsletter') }}" method="POST">

                    @csrf

                    <label for="bname">Newsletter heading</label>
                    <input type="text" name="title" id="bname" placeholder="type Newsletter heading here!">
                    <label for="bauthor">Newsletter title</label>
                    <input type="text" name="sub_title" id="bauthor" placeholder="type Newsletter title here!">
                    <label for="bsum">Newsletter Summary</label>
                    <textarea type="text" name="summary" id="bsum" placeholder="type Newsletter Summary here!"></textarea>
                    <label for="bdesc">Newsletter Description</label>
                    <textarea type="text" name="description" id="bdesc" placeholder="type Newsletter Description here!"></textarea>
                    <label for="bimg">Newsletter Image</label>
                    <input type="file" name="image" id="bimg">
                    @foreach($errors as $error)
                        <p class="sbt-msg">{{ $error }}</p>
                    @endforeach
                    <div class="lg-btn">
                        <button href="#" id="sbt"><span></span>Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>