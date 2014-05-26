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


        <div id="left-sidebar">
            <div id="top-left-sidebar">
                <h3>RECENT POSTS</h3>
            </div>
            @if(Session::has('message'))
                <p class="alert">{{ Session::get('message') }}</p>
            @endif    

            @yield('post')

            <!--
            <div id="post">
                <div class="foto-post">
                    <img src="#" width="593" height="190">
                </div>

                <div class="post-info">

                    <div class="info">
                        <p class="author-post">August 8th, 2010 by <a href="#">Admin</a></p>
                    </div>

                    <div class="commentnum">
                        <p class="author-post">22 <a href="#">  Comments</a></p>
                    </div>

                    <div class="clear"></div>
                    <span><hr /></span>

                    <div class="entry">
                        <h2>Afternoon Harvest</h2>
                        <p class="description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In massa libero, interdum quis ullamcorper a, pellentesque nec tellus. Donec sit amet lectus a nisi sagittis consequat sed vitae mauris. Quisque ut diam ligula, sed viverra tellus. Curabitur suscipit dignissim odio vel porttitor. Vestibulum dignissim justo eu nisl vestibulum ultricies. Nullam egestas dictum ipsum in eleifend. Morbi tellus nisl, ultrices vitae consectetur non, tincidunt in risus.
                        </p>
                        <p class="read-more"><a href="#">Read More...</a></p>
                    </div>
                </div>
            </div>


            <div id="post">
                <div class="foto-post">
                    <img src="#" width="593" height="190">
                </div>

                <div class="post-info">

                    <div class="info">
                        <p class="author-post">August 8th, 2010 by <a href="#">Admin</a></p>
                    </div>

                    <div class="commentnum">
                        <p class="author-post">22 <a href="#">  Comments</a></p>
                    </div>

                    <div class="clear"></div>
                    <span><hr></span>

                    <div class="entry">
                        <h2>Afternoon Harvest</h2>
                        <p class="description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In massa libero, interdum quis ullamcorper a, pellentesque nec tellus. Donec sit amet lectus a nisi sagittis consequat sed vitae mauris. Quisque ut diam ligula, sed viverra tellus. Curabitur suscipit dignissim odio vel porttitor. Vestibulum dignissim justo eu nisl vestibulum ultricies. Nullam egestas dictum ipsum in eleifend. Morbi tellus nisl, ultrices vitae consectetur non, tincidunt in risus.
                        </p>
                        <p class="read-more"><a href="#">Read More...</a></p>
                    </div>
                </div>
            </div>


            <div id="post">
                <div class="foto-post">
                    <img src="#" width="593" height="190">
                </div>

                <div class="post-info">

                    <div class="info">
                        <p class="author-post">August 8th, 2010 by <a href="#">Admin</a></p>
                    </div>

                    <div class="commentnum">
                        <p class="author-post">22 <a href="#">  Comments</a></p>
                    </div>

                    <div class="clear"></div>
                    <span><hr /></span>

                    <div class="entry">
                        <h2>Afternoon Harvest</h2>
                        <p class="description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In massa libero, interdum quis ullamcorper a, pellentesque nec tellus. Donec sit amet lectus a nisi sagittis consequat sed vitae mauris. Quisque ut diam ligula, sed viverra tellus. Curabitur suscipit dignissim odio vel porttitor. Vestibulum dignissim justo eu nisl vestibulum ultricies. Nullam egestas dictum ipsum in eleifend. Morbi tellus nisl, ultrices vitae consectetur non, tincidunt in risus.
                        </p>
                        <p class="read-more"><a href="#">Read More...</a></p>
                    </div>
                </div>
            </div>
            -->
            

        </div>



        <div id="right-sidebar">


            <div class="rubrics">
                <ul>
                    <h3>RUBRICS</h3>
                    <ul>
                        <li><a href="#">Lorem ipsum dolor sit amet </a></li>
                        <hr>
                        <li><a href="#">Lorem ipsum dolor sit amet </a></li>
                        <hr>
                        <li><a href="#">Lorem ipsum dolor sit amet </a></li>
                        <hr>
                    </ul>
                </ul>
            </div><!-- end runrics -->



            <div class="last-posts">
                <ul>
                    <h3>LATEST POSTS</h3>
                    <ul>
                        <li>
                            <a href="#">70 Must-Have CSS3 and HTML5 Tutorials and Resources http://snurl.com/plkg6</a><br>
                            <span class="date-create-post">about 6 hours ago</span>
                        </li>
                        <hr>
                        <li>
                            <a href="#">70 Must-Have CSS3 and HTML5 Tutorials and Resources http://snurl.com/plkg6</a><br>
                            <span class="date-create-post">about 6 hours ago</span>
                        </li>
                        <hr>
                        <li>
                            <a href="#">70 Must-Have CSS3 and HTML5 Tutorials and Resources http://snurl.com/plkg6</a><br>
                            <span class="date-create-post">about 6 hours ago</span>
                        </li>
                        <hr>
                    </ul>
                </ul>
            </div><!-- end last-posts -->

            <div class="most-popular">
                <ul>
                    <h3>MOST POPULAR</h3>
                    <ul>
                        <li><a href="#">Aliquam sollicitudin. Donec dapibus nibh</a></li>
                        <hr>
                        <li><a href="#">Aliquam sollicitudin. Donec dapibus nibh</a></li>
                        <hr>
                        <li><a href="#">Aliquam sollicitudin. Donec dapibus nibh</a></li>
                        <hr>
                    </ul>
                </ul>
            </div><!-- end most-popular -->


        </div><!-- end right-sidebar -->


        <div class="clear"></div>


        <div class="paginator">

        </div><!-- end paginator -->

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
