<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title id="title">Users | BabuLyrics</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/user.css" type="text/css">
        <link rel="icon" type="image/x-icon" href="assets/logo.png" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Anek+Devanagari&family=Raleway:wght@100;800&display=swap" rel="stylesheet">
    </head>
    <body>
        @include('navbar/navbar')
        <div class="bg-admin">
            <div class="container">
                <div class="bg-title">
                    <h1 class="bg-h">Staff Accounts</h1>
                    <!--a href="addnewsletter.html"><button class="add">Add Newsletter &plus;</button></a-->
                </div>
                <div class="table-div">
                    <table cellspacing="0" width="100%">
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Second Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                        </tr>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->second_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>+250{{ $user->phone_number }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>