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
                        <p><a href="/">Exquisite</a></p>
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

                    @if(Auth::check())

                        <nav class="dropdown">
                            <ul>
                                <li>
                                    <a href="#">{{ HTML::image('img/user-icon.gif', Auth::user()->firstname) }} {{ Auth::user()->firstname }} {{ HTML::image('img/down-arrow.gif', Auth::user()->firstname) }}</a>
                                    <ul>
                                        @if(Auth::user()->admin == 1)
                                        <li>{{ HTML::link('admin/categories', 'Manage Categories') }}</li>
                                        <li>{{ HTML::link('admin/products', 'Manage Products') }}</li>
                                        @endif
                                        <li>{{ HTML::link('users/signout', 'Sign Out') }}</li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>

                    @else

                        <nav class="dropdown">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Contact</a></li>
                                    <ul>
                                        <li>{{ HTML::link('users/signin', 'Вход') }}           </li>
                                        <li>{{ HTML::link('users/newaccount', 'Регистрация') }}</li>
                                    </ul>

                            </ul>
                        </nav>

                    @endif


                    </div><!-- end user-menu -->

                    <div class="clear"></div>

                    <div id="search-form">
                        {{ Form::open(array('url' => 'start/search', 'method' => 'get' )) }}
                        {{ form::text('keyword', null, array('placeholder' => '     Поиск ...', 'class' => 'input-search' )) }}
                        {{ Form::submit('Поиск', array('class' => 'btn-search submit')) }}
                        {{ Form::close() }}
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

                @yield('search-keyword')

        <section id="main-content" class="content-post">

                <!--@yield('posts')-->

                @if(Session::has('message'))
                    <p class="alert">{{ Session::get('message') }}</p>
                @endif

                @yield('content')



            <div id="right-sidebar">


                <div class="rubrics">
                    <ul>
                        <h3>RUBRICS</h3>
                        <ul>
                            @foreach($catnav as $cat)
                                <li>{{ HTML::link('/start/category/' . $cat->id, $cat->name) }}</li>
                                <hr>
                            @endforeach
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


           <!-- <div class="paginator">

            </div> --><!-- end paginator -->

            @yield('pagination')

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
                            <li>{{ HTML::link('users/signin', 'Вход') }}           </li>
                            <li>{{ HTML::link('users/newaccount', 'Регистрация') }}</li>
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
