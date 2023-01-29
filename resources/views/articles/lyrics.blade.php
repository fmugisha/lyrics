<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title id="title">Lyrics | BabuLyrics</title>
        <link rel="icon" type="image/x-icon" href="assets/logo.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/lyrics.css" type="text/css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Anek+Devanagari&family=Raleway:wght@100;800&display=swap" rel="stylesheet">
    </head>
    <body>
        @include('navbar/navbar')
        <div class="bg-admin">
            <div class="container">
                <div class="bg-title">
                    <h1 class="bg-h">Lyrics</h1>
                    <a href="{{ route('articles.createlyrics') }}"><button class="add">Add Lyrics &plus;</button></a>
                </div>
                <div class="table-div">
                    <table cellspacing="0" width="100%">
                        <tr>
                            <th>#</th>
                            <th>Song_Name</th>
                            <th>Song_Address</th>
                            <th>Created_at</th>
                            <th id="action">Action</th>
                        </tr>
                        @foreach($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->song_name }}</td>
                            <td>{{ $article->song_address }}</td>
                            <td>{{ $article->created_at }}</td>
                            <td class="t-btn">
                                <a href="{{ route('articles.editlyrics', $article) }}" class="actionBtn row-id">Edit</a>
                                <form method="POST" action="{{ route('articles.destroylyrics', $article) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="actionBtn row-del">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>