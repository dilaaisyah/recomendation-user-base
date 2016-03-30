<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Wisata</title>

    <meta name="keywords" content="">

    {!! HTML::style('http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,700,800') !!}

    <!-- Bootstrap and Font Awesome css -->
    {!! HTML::style('css/font-awesome.css') !!}
    {!! HTML::style('css/bootstrap.min.css') !!}

    @yield('head')

    <!-- Css animations  -->
    {!! HTML::style('css/animate.css') !!}
    <!-- Theme stylesheet, if possible do not edit this stylesheet -->
    {!! HTML::style('css/style.default.css') !!}
    <!-- Custom stylesheet - for your changes -->
    {!! HTML::style('css/custom.css') !!}

    <!-- Responsivity for older IE -->
    <!--[if lt IE 9]>
        {!! HTML::script('https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js') !!}
        {!! HTML::script('https://oss.maxcdn.com/respond/1.4.2/respond.min.js') !!}
    <![endif]-->

    <!-- Favicon and apple touch icons-->
    <link rel="shortcut icon" href="{!! asset('img/favicon.ico') !!}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{!! asset('img/apple-touch-icon.png') !!}" />
    <link rel="apple-touch-icon" sizes="57x57" href="{!! asset('img/apple-touch-icon-57x57.png') !!}" />
    <link rel="apple-touch-icon" sizes="72x72" href="{!! asset('img/apple-touch-icon-72x72.png') !!}" />
    <link rel="apple-touch-icon" sizes="76x76" href="{!! asset('img/apple-touch-icon-76x76.png') !!}" />
    <link rel="apple-touch-icon" sizes="114x114" href="{!! asset('img/apple-touch-icon-114x114.png') !!}" />
    <link rel="apple-touch-icon" sizes="120x120" href="{!! asset('img/apple-touch-icon-120x120.png') !!}" />
    <link rel="apple-touch-icon" sizes="144x144" href="{!! asset('img/apple-touch-icon-144x144.png') !!}" />
    <link rel="apple-touch-icon" sizes="152x152" href="{!! asset('img/apple-touch-icon-152x152.png') !!}" />
    
    <!-- owl carousel css -->
    {!! HTML::style('css//owl.carousel.css') !!}
    {!! HTML::style('css//owl.theme.css') !!}

</head>

<body>
    <div id="all">
        <header>
            <!-- *** TOP *** -->
            <div id="top">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-5 contact">
                            <p class="hidden-sm hidden-xs">Contact us on +420 777 555 333 or hello@universal.com.</p>
                            <p class="hidden-md hidden-lg"><a href="#" data-animate-hover="pulse"><i class="fa fa-phone"></i></a>  <a href="#" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                            </p>
                        </div>
                        <div class="col-xs-7">
                            <div class="social">
                                <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                                <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                            </div>

                            <div class="login">                                
                                @if(session('statut') == 'visitor')
                                    <i class="fa fa-sign-in"></i> {!! link_to('auth/login', 'LOGIN') !!}
                                    <i class="fa fa-user"></i> {!! link_to('auth/register', 'REGISTER') !!}
                                @else
                                    <i class="fa fa-sign-in"></i> {!! link_to('auth/logout', 'LOGOUT') !!}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- *** TOP END *** -->

            <!-- *** NAVBAR *** -->

            <div class="navbar-affixed-top" data-spy="affix" data-offset-top="200">
                <div class="navbar navbar-default yamm" role="navigation" id="navbar">
                    <div class="container">
                        <div class="navbar-header">
                            <a class="navbar-brand home" href="{!! url('/') !!}">
                                <img src="{!! asset('img/logo.png') !!}" alt="Universal logo" class="hidden-xs hidden-sm">
                                <img src="{!! asset('img/logo-small.png') !!}" alt="Universal logo" class="visible-xs visible-sm"><span class="sr-only">Universal - go to homepage</span>
                            </a>
                            <div class="navbar-buttons">
                                <button type="button" class="navbar-toggle btn-template-main" data-toggle="collapse" data-target="#navigation">
                                    <span class="sr-only">Toggle navigation</span>
                                    <i class="fa fa-align-justify"></i>
                                </button>
                            </div>
                        </div>
                        <!--/.navbar-header -->

                        <div class="navbar-collapse collapse" id="navigation">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="{!! classActivePath('/') !!}">
                                    {!! link_to('/', 'Home') !!}
                                </li>
                                <li class="dropdown {!! classActiveOnlySegment(1, ['blogs', 'blog']) !!}">
                                    <a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown">Wisata <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{!! url('blogs/category?category=kuliner') !!}">Kuliner</a></li>
                                        <li><a href="{!! url('blogs/category?category=populer') !!}">Populer</a></li>
                                        <li><a href="{!! url('blogs/category?category=religi') !!}">Religi</a></li>
                                        <li><a href="{!! url('blogs/category?category=alam') !!}">Alam</a></li>
                                        <li><a href="{!! url('blogs/category?category=sejarah') !!}">Sejarah</a></li>
                                    </ul>
                                </li>                              
                                @if(session('statut') == 'admin')
                                    <li>
                                        {!! link_to_route('admin', 'admin') !!}
                                    </li>
                                @elseif(session('statut') == 'redac') 
                                    <li>
                                        {!! link_to('blog', 'redaction') !!}
                                    </li>
                                @endif                                
                                @if(session('statut') == 'visitor' || session('statut') == 'user')
                                    <li class="{!! classActivePath('contact/create') !!}">
                                        {!! link_to('contact/create', 'contact') !!}
                                    </li>
                                @endif
                            </ul>

                        </div>
                        <!--/.nav-collapse -->

                        <div class="collapse clearfix" id="search">
                            <form class="navbar-form" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </form>

                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
                <!-- /#navbar -->
            </div>
            <!-- *** NAVBAR END *** -->
        </header>   

        @yield('main')

        <!-- *** FOOTER *** -->
        <footer id="footer">
            <div class="container">
                <div class="col-md-3 col-sm-6">
                    <h4>About us</h4>

                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

                    <hr class="hidden-md hidden-lg hidden-sm">
                </div>
                <!-- /.col-md-3 -->

                <div class="col-md-3 col-sm-6">

                    <h4>Blog</h4>

                    <div class="blog-entries">
                        <div class="item same-height-row clearfix">
                            <div class="image same-height-always">
                                <a href="#">
                                    <img class="img-responsive" src="{!! asset('img/detailsquare.jpg') !!}" alt="">
                                </a>
                            </div>
                            <div class="name same-height-always">
                                <h5><a href="#">Blog post name</a></h5>
                            </div>
                        </div>

                        <div class="item same-height-row clearfix">
                            <div class="image same-height-always">
                                <a href="#">
                                    <img class="img-responsive" src="{!! asset('img/detailsquare.jpg') !!}" alt="">
                                </a>
                            </div>
                            <div class="name same-height-always">
                                <h5><a href="#">Blog post name</a></h5>
                            </div>
                        </div>

                        <div class="item same-height-row clearfix">
                            <div class="image same-height-always">
                                <a href="#">
                                    <img class="img-responsive" src="{!! asset('img/detailsquare.jpg') !!}" alt="">
                                </a>
                            </div>
                            <div class="name same-height-always">
                                <h5><a href="#">Very very long blog post name</a></h5>
                            </div>
                        </div>
                    </div>

                    <hr class="hidden-md hidden-lg">

                </div>
                <!-- /.col-md-3 -->

                <div class="col-md-3 col-sm-6">

                    <h4>Contact</h4>

                    <p><strong>Universal Ltd.</strong>
                        <br>13/25 New Avenue
                        <br>Newtown upon River
                        <br>45Y 73J
                        <br>England
                        <br>
                        <strong>Great Britain</strong>
                    </p>

                    {!! link_to('contact/create', 'Go to contact page', ['class' => 'btn btn-small btn-template-main']) !!}

                    <hr class="hidden-md hidden-lg hidden-sm">

                </div>
                <!-- /.col-md-3 -->

                <div class="col-md-3 col-sm-6">

                    <h4>Photostream</h4>

                    <div class="photostream">
                        <div>
                            <a href="#">
                                <img src="{!! asset('img/detailsquare.jpg') !!}" class="img-responsive" alt="#">
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <img src="{!! asset('img/detailsquare2.jpg') !!}" class="img-responsive" alt="#">
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <img src="{!! asset('img/detailsquare3.jpg') !!}" class="img-responsive" alt="#">
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <img src="{!! asset('img/detailsquare3.jpg') !!}" class="img-responsive" alt="#">
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <img src="{!! asset('img/detailsquare2.jpg') !!}" class="img-responsive" alt="#">
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <img src="{!! asset('img/detailsquare.jpg') !!}" class="img-responsive" alt="#">
                            </a>
                        </div>
                    </div>

                </div>
                <!-- /.col-md-3 -->
            </div>
            <!-- /.container -->
        </footer>
        <!-- /#footer -->
        <!-- *** FOOTER END *** -->

        <!-- *** COPYRIGHT *** -->
        <div id="copyright">
            <div class="container">
                <div class="col-md-12">
                    <p class="pull-left">&copy; 2015. Your company / name goes here</p>
                    <p class="pull-right">Template by <a href="http://bootstrapious.com">Bootstrap 4 Themes</a> with support from <a href="http://kakusei.cz">Designové předměty</a> 
                        <!-- Not removing these links is part of the licence conditions of the template. Thanks for understanding :) -->
                    </p>

                </div>
            </div>
        </div>
        <!-- /#copyright -->
        <!-- *** COPYRIGHT END *** -->



    </div>
    <!-- /#all -->

    <!-- #### JAVASCRIPT FILES ### -->

    {!! HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') !!}
    <script>
        window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')
    </script>
    {!! HTML::script('http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js') !!}

    {!! HTML::script('js/jquery.cookie.js') !!}
    {!! HTML::script('js/waypoints.min.js') !!}
    {!! HTML::script('js/jquery.counterup.min.js') !!}
    {!! HTML::script('js/jquery.parallax-1.1.3.js') !!}
    {!! HTML::script('js/front.js') !!}  
    {!! HTML::script('js/custom.js') !!}  

    <!-- owl carousel -->
    {!! HTML::script('js/owl.carousel.min.js') !!} 

    @yield('scripts')

</body>

</html>