<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title id="title">NewsLetter | BabuLyrics</title>
        <link rel="icon" type="image/x-icon" href="assets/logo.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/newsletter.css" type="text/css">
        <link rel="icon" href="images/lb.png" type="image/png">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Anek+Devanagari&family=Raleway:wght@100;800&display=swap" rel="stylesheet">
    </head>
    <body>
        @include('navbar/navbar')
        <div class="bg-admin">
            <div class="container">
                <div class="bg-title">
                    <h1 class="bg-h">Newsletter</h1>
                    <a href="{{ route('newsletters.createnewsletter') }}"><button class="add">Add Newsletter &plus;</button></a>
                </div>
                <div class="table-div">
                    <table cellspacing="0" width="100%">
                        <tr>
                            <th>#</th>
                            <th>Heading</th>
                            <th>Title</th>
                            <th>Summary</th>
                            <th>Created_at</th>
                            <th id="action">Action</th>
                        </tr>
                        @foreach ($newsletters as $newsletter)
                        <tr>
                            <td>{{ $newsletter->id }}</td>
                            <td>{{ $newsletter->title }}</td>
                            <td>{{ $newsletter->sub_title }}</td>
                            <td>{{ $newsletter->summary }}</td>
                            <td>{{ $newsletter->created_at }}</td>
                            <td class="t-btn">
                                <a href="{{ route('newsletters.editnewsletter', $newsletter) }}" class="actionBtn row-id">Edit</a>
                                <form method="POST" action="{{ route('newsletters.destroynewsletter', $newsletter) }}" class="actionBtn">
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