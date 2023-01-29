<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title id="title">Add Lyrics | BabuLyrics</title>
        <link rel="icon" type="image/x-icon" href="assets/logo.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/addlyrics.css" type="text/css">
        <link rel="icon" href="images/lb.png" type="image/png">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Anek+Devanagari&family=Raleway:wght@100;800&display=swap" rel="stylesheet">
    </head>
    <body>
        @include('navbar/navbar')
        <div class="bg-admin">
            <div class="container bk-form">
                <a href="{{ route('articles.lyrics') }}" class="bk-btn" id="bk-id">&times;</a>
                <h1>Add Lyrics</h1>
                <form action="{{ route('articles.addlyrics') }}" method="post">

                    @csrf

                    <label for="bname">Song Name</label>
                    <select class="sname" id="song" name="songname">
                        <option selected disabled="disabled">Select Song name</option>
                        @foreach($songs as $song)
                            <option value="{{ $song->song_name }}">{{ $song->song_name }}</option>
                        @endforeach
                    </select>
                    <!--input type="text" name="song" id="bname" placeholder="type song name here!"-->
                    <label for="bauthor">Artist Name</label>
                    <input type="text" name="artist" id="bauthor" class="artist-name" placeholder="Artist name auto selected" readonly>
                    <label for="bimg">Song Address</label>
                    <input type="text" name="address" id="bimg" class="song-address" placeholder="Song address auto selected" readonly>
                    <label for="bdesc">Song Lyrics</label>
                    <textarea type="text" name="lyrics" id="bdesc" placeholder="type song lyrics here!"></textarea>
                    <input type="number" name="songid" id="songid" class="song-id" hidden>
                    @foreach($errors as $error)
                        <p class="sbt-msg">{{ $error }}</p>
                    @endforeach
                    <div class="lg-btn">
                        <button href="#" id="sbt"><span></span>Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $(document).on('change', '.sname', function () {
                    let id = $(this).val();
                    let a = $(this).parent();
                    let inp = "";

                    $.ajax({
                        type: 'get',
                        url: '{!!URL::to("getdetails/' + id + '")!!}',
                        // data: {'id': id},
                        dataType: 'json',
                        success: function (data) {
                            a.find('.artist-name').val(data.artist_name);
                            a.find('.song-address').val(data.song_address);
                            a.find('.song-id').val(data.id);
                        },
                        error: function () {
                            //
                        }
                    })
                })
            });
        </script>
    </body>
</html>