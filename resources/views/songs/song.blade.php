<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title id="title">Songs | BabuLyrics</title>
        <link rel="icon" type="image/x-icon" href="assets/logo.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/song.css" type="text/css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Anek+Devanagari&family=Raleway:wght@100;800&display=swap" rel="stylesheet">
    </head>
    <body>
        @include('navbar/navbar')
        <div class="bg-admin">
            <div class="container">
                <div class="bg-title">
                    <h1 class="bg-h">Songs</h1>
                    <a href="{{ route('songs.createsong') }}"><button class="add">Add Song &plus;</button></a>
                </div>
                <div class="table-div">
                    <table cellspacing="0" width="100%">
                        <tr>
                            <th>#</th>
                            <th>Song_Name</th>
                            <th>Artist_Name</th>
                            <th>Song_Address</th>
                            <th>Created_at</th>
                            <th id="action">Action</th>
                        </tr>
                        @foreach($songs as $song)
                        <tr>
                            <td>{{ $song->id }}</td>
                            <td>{{ $song->song_name }}</td>
                            <td>{{ $song->artist_name }}</td>
                            <td>{{ $song->song_address }}</td>
                            <td>{{ $song->created_at }}</td>
                            <td class="t-btn">
                                <a href="{{ route('songs.editsong', $song) }}" class="actionBtn row-id">Edit</a>
                                <form method="POST" action="{{ route('songs.deletesong', $song) }}">
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