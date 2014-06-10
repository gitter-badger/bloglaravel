        <!DOCTYPE html>
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <title>Блог студента</title>
            <meta name="description" content="">
            <meta name="viewport" content="width=device-width">

            <!-- Place for tinymce -->
            <script type="text/javascript" src="{{ URL::asset('js/tinymce/tinymce.min.js') }}"></script>
            <script type="text/javascript">
                tinymce.init({
                    selector: "textarea"
                });
            </script>
            <!--End Place for tinymce -->

            <!-- Place Buttom Top -->
            <script src="http://code.jquery.com/jquery-latest.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function(){

                    $(window).scroll(function(){
                        if ($(this).scrollTop() > 100) {
                            $('.scrollup').fadeIn();
                        } else {
                            $('.scrollup').fadeOut();
                        }
                    });
                    $('.scrollup').click(function(){
                        $("html, body").animate({ scrollTop: 0 }, 600);
                        return false;
                    });
                });
            </script>
            <!-- End Place Buttom Top -->

            <!-- Social bottoms -->
            <div class="share42init" data-top1="135" data-top2="20" data-margin="10" data-zero-counter="1"></div>
            <script type="text/javascript" src="{{ URL::asset('share42/share42.js') }} "></script>
            <!-- END Social bottoms -->


            <script type="text/javascript" src="{{ URL::asset('js/coin-slider.js') }} "></script>
            <link rel="stylesheet" href="{{ URL::asset('css/coin-slider-styles.css') }} " type="text/css" />

            {{ HTML::style('tb/css/bootstrap.css') }}
            {{ HTML::style('tb/css/bootstrap-theme.min.css') }}
            {{ HTML::script('tb/js/bootstrap.min.js') }}
            {{ HTML::style('css/main.css') }}
            {{ HTML::script('js/vendor/modernizr-2.6.2.min.js') }}


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
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Blog</a></li>
                                <li>{{ HTML::link('start/about',  'О сайте') }}</li>
                                <li><a href="#">Contact</a></li>
                                <li class="drop">
                                    <a href="#">{{ HTML::image('img/user-icon.gif', Auth::user()->firstname) }} {{ Auth::user()->firstname }} </a>
                                    <div class="dropdownContain">
                                    <div class="dropOut">
                                        <div class="triangle"></div>
                                        <ul>
                                            @if(Auth::user()->admin == 1)
                                                <li>{{ HTML::link('admin/categories', 'Управления Категориями') }}</li>
                                                <li>{{ HTML::link('admin/posts', 'Управления Заметками') }}</li>
                                            @endif
                                            <li>{{ HTML::link('users/signout', 'Выход') }}</li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </nav>

                    @else

                        <nav class="dropdown">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Blog</a></li>
                                <li>{{ HTML::link('start/about',  'О сайте') }}</li>
                                <li><a href="#">Contact</a></li>
                                <li class="drop">
                                    <a href="#">Вход</a>
                                    <div class="dropdownContain">
                                        <div class="dropOut">
                                            <div class="triangle"></div>
                                            <ul>
                                                <li>{{ HTML::link('users/signin', 'Вход') }}           </li>
                                                <li>{{ HTML::link('users/newaccount', 'Регистрация') }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </nav>

                    @endif


                    </div><!-- end user-menu -->

                    <div class="clear"></div>

                    <div id="search-form" >
                        {{ Form::open(array('url' => 'start/search', 'method' => 'get' )) }}
                        {{ form::text('keyword', null, array('placeholder' => '   Поиск ...', 'class' => 'input-medium search-query', 'id' => 'id="focusedInput"' )) }}
                        {{ Form::submit('Поиск', array('class' => 'btn')) }}
                        {{ Form::close() }}
                    </div><!-- end search-form -->

                    <div class="clear"></div>


                    <div id="top-slider">

                        <div id='coin-slider'>
                            <a href="#" target="_blank">
                                <img src=" {{ URL::asset('img/slideshow/original.jpg') }} " >
                                <span>
                                    Description for img01
                                </span>
                            </a>
                            <a href="#" target="_blank">
                                <img src=" {{ URL::asset('img/slideshow/original1.jpg') }} " >
                                <span>
                                    Description for img02
                                </span>
                            </a>
                        </div>
                        <script>
                            $('#coin-slider').coinslider(
                                {
                                    width: 535, // width of slider panel
                                    height: 235, // height of slider panel
                                    //spw: 7, // squares per width
                                    //sph: 5, // squares per height
                                    delay: 2000, // delay between images in ms
                                    //sDelay: 10, // delay beetwen squares in ms
                                    opacity: 0.7, // opacity of title and navigation
                                    titleSpeed: 500, // speed of title appereance in ms
                                    effect: 'swirl', // random, swirl, rain, straight
                                    navigation: true, // prev next and buttons
                                    links : true, // show images as links
                                    hoverPause: true // pause on hover
                                }
                            );
                        </script>


                    </div>


                    <!--
                    <div id="top-slider">
                        <ul>
                            <li><a href="#"><img src="#"></a></li>
                            <li><a href="#"><img src="#"></a></li>
                            <li><a href="#"><img src="#"></a></li>
                            <li><a href="#"><img src="#"></a></li>
                        </ul>
                    </div>
                    -->
                    <!-- end top-slider -->


                </section><!-- end top-area  two-->
            </section>
        </header>

        <div class="clear"></div>

                @yield('search-keyword')

        <section id="main-content" class="content-post">

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
                            @foreach($lastPosts as $lastPost)
                                <li>
                                    {{ HTML::link('/start/view/' . $lastPost->id, $lastPost->post_title ) }}
                                    <br>
                                    <span class="date-create-post">{{ $lastPost->post_date }}</span>
                                </li>
                                <hr>
                            @endforeach
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
                            <li>{{ HTML::link('start/about',  'О сайте') }}</li>
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


        <a href="#" class="scrollup">Наверх</a>
        </body>
        </html>
