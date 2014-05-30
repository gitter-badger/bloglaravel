        <!DOCTYPE html>
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <title>Блог студента</title>
            <meta name="description" content="">
            <meta name="viewport" content="width=device-width">


            {{HTML::style('css/main.css')}}
            {{HTML::script('js/vendor/modernizr-2.6.2.min.js')}}
            <script type="text/script" src="main.js"></script>

        </head>

        <body>
        <div id="wrapper">
        <header>
            <section id="top-area">
                <section id="top-area-one">
                    <div id="logo">
                        <p><a href="/">Exquisite</a>{{HTML::link('')}}</p>
                    </div><!-- end logo -->

                    <div id="slogan">
                        <p class="welcome">Welcome</p>
                        <p class="text-welcome">
                            This is the portfolio of Jane Doe, a Portland based freelance photographer. If you would like to see some more of my photographs just scroll down. Intersted in my biography? Check out the “About” section.
                        </p>
                    </div><!-- end slogan -->

                </section><!-- end top-area  one-->

                <section id="top-area-two">
                    <div id="user-top-menu">
                        <nav class="dropdown">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </nav>
                    </div><!-- end user-menu -->

                    <div class="clear"></div>

                    <div id="search-form">
                        <p>
                            <input type="text" class="input-search" placeholder=" Search..." size="40" />
                            <input type="submit" class="btn-search" value="Search">
                        </p>
                    </div><!-- end search-form -->

                    <div class="clear"></div>

                    <div id="top-slider">
                        <ul>
                            <li><a href="#"><img src="#"></a></li>
                            <li><a href="#"><img src="#"></a></li>
                            <li><a href="#"><img src="#"></a></li>
                            <li><a href="#"><img src="#"></a></li>
                        </ul>
                    </div><!-- end top-slider -->

                </section><!-- end top-area  two-->
            </section>
        </header>

        <div class="clear"></div>


        <section id="main-content" class="content-post">



                @if(Session::has('message'))
                    <p class="alert">{{ Session::get('message') }}</p>
                @endif

                @yield('content')



        </section><!-- end main-content -->

        <div class="clear"></div>


        <footer>
            <section id="contact">
                <p>© 2014 Vitalii Sestrenskyi </p>
            </section><!-- end contact -->


            <section id="navigation">
                <div id="user-bottom-menu">
                    <nav class="dropdown">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </nav>
                </div><!-- end user-menu -->
            </section><!-- end links -->
        </footer>


        </div><!-- end wrapper -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

        </body>
        </html>
