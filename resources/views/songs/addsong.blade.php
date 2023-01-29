<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title id="title">Add Song | BabuLyrics</title>
        <link rel="icon" type="image/x-icon" href="assets/logo.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/addsong.css" type="text/css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Anek+Devanagari&family=Raleway:wght@100;800&display=swap" rel="stylesheet">
    </head>
    <body>
        @include('navbar/navbar')
        <div class="bg-admin">
            <div class="container bk-form">
                <a href="{{ route('songs.song') }}" class="bk-btn" id="bk-id">&times;</a>
                <h1>Add Song</h1>
                <form action="{{ route('songs.addsong') }}" method="POST">

                    @csrf

                    <label for="bname">Song Name</label>
                    <input type="text" name="songname" id="bname" placeholder="type song name here!">
                    <label for="bauthor">Artist Name</label>
                    <input type="text" name="artist" id="bauthor" placeholder="type artist name here!">
                    <label for="bdesc">Song Address</label>
                    <input type="text" name="address" id="bdesc" placeholder="type Address name here!">
                    @foreach($errors as $error)
                        <p class="sbt-msg">{{ $error }}</p>
                    @endforeach
                    <div class="lg-btn">
                        <button id="sbt"><span></span>Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>