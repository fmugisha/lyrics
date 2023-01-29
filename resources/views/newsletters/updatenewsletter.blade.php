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
        @include('navbar/navbar')
        <div class="bg-admin">
            <div class="container bk-form">
                <a href="{{ route('newsletters.newsletter') }}" class="bk-btn" id="bk-id">&times;</a>
                <h1>Update Article</h1>
                <form enctype="multipart/form-data" action="{{ route('newsletters.updatenewsletter', $newsletter) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <label for="bname">Newsletter heading</label>
                    <input type="text" name="title" id="bname" value="{{ $newsletter->title }}">
                    <label for="bauthor">Newsletter title</label>
                    <input type="text" name="sub_title" id="bauthor" value="{{ $newsletter->sub_title }}">
                    <label for="bsum">Newsletter Summary</label>
                    <textarea type="text" name="summary" id="bsum">{{ $newsletter->summary }}</textarea>
                    <label for="bdesc">Newsletter Description</label>
                    <textarea type="text" name="description" id="bdesc">{{ $newsletter->description }}</textarea>
                    <label for="bimg">Newsletter Image</label>
                    <input type="file" name="image" id="bimg">
                    <p class="sbt-msg"></p>
                    <div class="lg-btn">
                        <button href="#" id="sbt"><span></span>Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <script src="js/bk.js"></script>
    </body>
</html>