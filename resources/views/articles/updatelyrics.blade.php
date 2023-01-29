<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title id="title">Update Lyrics | BabuLyrics</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/addlyrics.css" type="text/css">
        <link rel="icon" type="image/x-icon" href="/assets/logo.png" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Anek+Devanagari&family=Raleway:wght@100;800&display=swap" rel="stylesheet">
    </head>
    <body>
        @include('navbar/navbar')
        <div class="bg-admin">
            <div class="container bk-form" id="table-container">
                <a href="{{ route('articles.lyrics') }}" class="bk-btn" id="bk-id">&times;</a>
                <h1>Update Lyrics</h1>
                <form action="{{ route('articles.updatelyrics', $article) }}" method="POST">

                    @csrf
                    @method('PUT')
                    <label for="bname">Song Name</label>
                    <select class="sname" id="song" name="songname">
                        @foreach($songs as $song)
                            <option value="{{ $song->song_name }}" @selected($song->id == $article->song_id)>{{ $song->song_name }}</option>
                        @endforeach
                    </select>
                    <!--input type="text" name="song" id="bname" placeholder="type song name here!"-->
                    <label for="bauthor">Artist Name</label>
                    <input type="text" name="artist" id="bauthor" value="{{ $article->artist_name }}" class="artist-name" readonly>
                    <label for="bimg">Song Address</label>
                    <input type="text" name="address" id="bimg" value="{{ $article->song_address }}" class="song-address" readonly>
                    <label for="bdesc">Song Lyrics</label>
                    <textarea type="text" name="lyrics" id="bdesc" class="article">{{ $article->lyrics }}</textarea>
                    <input type="number" name="songid" id="songid" value="{{ $article->song_id }}" class="song-id" hidden>
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