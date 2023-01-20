<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Article | BabuLyrics</title>
        <link rel="icon" type="image/x-icon" href="assets/logo.png" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Anek+Devanagari&family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link href="/css/article.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    </head>
    <body>
        <nav class="top_nav center">
            <a href="{{ route('index') }}" class="b_nav nav_lg">
                <span id="logo">
                    <span id="lg-name">Babu</span>Lyrics
                </span>
            </a>
        </nav>
        <section class="center">
        @foreach($articles as $article)
            <article class="b-container center">
                <header>
                    <h1>{{ $article->song_name }} by {{ $article->artist_name }}</h1>
                </header>
                <div class="b-content">
                    <div class="embeded-video">
                        <iframe src="https://www.youtube.com/embed/{{ $article->song_address }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                    <div class="article">
                        <p class="lyrics-page">{{ $article->lyrics }}</p>
                    </div>
                </div>
            </article>
        @endforeach
        </section>
        <div class="section center">
            <div class="navbar">
                <a href="#" class="d_nav">articles</a>
                <span class="d-line">/</span>
                <a href="{{ route('news') }}" class="d_nav">newsletter</a>
                <span class="d-line">/</span>
                <a href="{{ route('contact') }}" class="d_nav">contact us</a>
            </div>
            <div class="copy">Copyright &copy;<script>document.write(new Date().getFullYear())</script> BabuLyrics</div>
        </div>
    </body>
</html>
