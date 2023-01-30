        <style>
            .navbar {
                position: fixed;
                width: 16%;
                height: 100%;
                padding: 0;
                display: flex;
                flex-direction: column;
                background-color: #4e73df;
                z-index: 1;
                box-shadow: 0 0 5px 0;
            }

            #logo {
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                font-size: 2rem;
                padding: 0 1rem;
                cursor: pointer;
                color: #fff;
            }

            #lg-name {
                font-family: 'Raleway', sans-serif;
                font-weight: 900;
            }

            .hrline {
                width: 11rem;
                margin-left: 1.2rem;
                height:1px;
                border-width:0;
                color:rgba(255, 255, 255, 0.2);
                background-color:rgba(255, 255, 255, 0.2);
            }

            .navline {
                margin-left: 0 !important;
            }

            .lg {
                cursor: pointer;
                width: 100%;
                height: auto;
                max-width: 3vw;
            }

             .navbar .ad-pro {
                display: flex;
                flex-direction: column;
                justify-self: center;
                margin: 5% 0;
                width: 60%;
                transform: translateX(30%);
            }

            .ad-pro img {
                width: 100%;
                height: 100%;
                max-width: 4vw;
                max-height: auto;
                border: 1px solid rgb(91, 68, 110);
                border-radius: 50%;
                margin: 0 0 0 10px;
                transform: translateX(80%);
            }

            .ad-pro .ad-name {
                padding: 5% 0;
                transform: translateX(30%);
                font-size: 20px;
            }

            .logo {
                display: flex;
                margin: 10% 5%;
            }

            .logo a {
                padding-left: 5%;
            }

            .navbar .h-site {
                font-size: 20px;
                margin-left: 20%;
            }

            .navbar ul li, .h-site {
                padding: 1rem 0;
            }

            .navbar .h-site img {
                position: absolute;
                width: 8%;
                height: auto;
                color: #000;
                animation: arr-display 0.8s infinite;
            }

            .navbar .h-site a {
                margin-left: 15%;
                text-decoration: none;
                color: #fff;
            }

            .navbar ul {
                width: 80%;
                height: 80%;
                margin: 0 10%;
                padding: 4% 0;
                display: flex;
                flex-direction: column;
            }

            .navbar ul li {
                list-style: none;
                display: inline-block;
                margin-left: 20px;
                position: relative;
                padding: 1rem 0;
            }

            .navbar ul li a {
                text-decoration: none;
                color: #fff;
                text-transform: uppercase;
            }

            .icon {
                padding-right: 1rem;
            }

            .navbar .ad-icon {
                width: 25px;
                margin-right: 10px;
            }

            .user {
                background-color: rgba(255, 255, 255, 0.2);
                width: 12rem;
                height: 6rem;
                padding: 1rem;
                margin-left: 1.2rem;
                border-radius: 5px;
            }

            .user .user-name {
                font-weight: 600;
            }

            .footer {
                color: #fff;
                text-align: center;
                margin: 0.5rem 0;
            }

            #ad-dash {
                font-weight: 600;
            }
        </style>
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
                <li><a href="{{ route('dashboard') }}" id="ad-dash"><img src="/assets/dashboard.png" class="icon"/>Dashboard</a></li>
                <hr class="hrline navline">
                <li><a href="{{ route('songs.song') }}"><img src="/assets/song.png" class="icon"/>Songs</a></li>
                <hr class="hrline navline">
                <li><a href="{{ route('articles.lyrics') }}"><img src="/assets/article.png" class="icon"/>Articles</a></li>
                <hr class="hrline navline">
                <li><a href="{{ route('newsletters.newsletter') }}"><img src="/assets/newsletter.png" class="icon"/>Newsletter</a></li>
                <hr class="hrline navline">
                <li><a href="#"><img src="/assets/messages.png" class="icon"/>Messages</a></li>
                <hr class="hrline navline">
                <li><a href="{{ route('accounts.user') }}"><img src="/assets/users.png" class="icon"/>Users</a></li>
                <hr class="hrline navline">
                <li><a href="{{ route('accounts.signout') }}"><img src="/assets/logout.png" class="icon"/>Logout</a></li>
            </ul>
            <div class="user">
                <p class="user-title">Logged In By:</p>
                <p class="user-name">{{ auth()->user()->first_name }} {{ auth()->user()->second_name }}</p>
            </div>
            <div class="footer">Copyright 
                &copy;<script>document.write(new Date().getFullYear())</script>. BabuLyrics
            </div>
        </div>