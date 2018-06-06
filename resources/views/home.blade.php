
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
    <!--<![endif]-->

    <head>
        <meta charset="utf-8">
        <meta name="robots" content="all,follow">
        <meta name="googlebot" content="index,follow,snippet,archive">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>KofoundME | A paradigm shift!</title>

        <meta name="keywords" content="">

        <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,900' rel='stylesheet' type='text/css'>

        <!-- Bootstrap and Font Awesome css -->
        <link href="{{asset('assets/template/css/font-awesome.css')}}" rel="stylesheet">
        <link href="{{asset('assets/template/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- owl carousel css -->

        <link href="{{asset('assets/template/css/owl.carousel.css')}}" rel="stylesheet">
        <link href="{{asset('assets/template/css/owl.theme.css')}}" rel="stylesheet">	        

        <!-- Theme stylesheet -->
        <link href="{{asset('assets/template/css/style.default.css')}}" rel="stylesheet" id="theme-stylesheet">

        <!-- Custom stylesheet - for your changes -->
        <link href="{{asset('assets/template/css/custom.css')}}" rel="stylesheet">

        <!-- CSS Animations -->
        <link href="{{asset('assets/template/css/animate.css')}}" rel="stylesheet">

        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.png">

        <!-- Mordernizr -->
        <script src="{{asset('assets/template/js/modernizr-2.6.2.min.js')}}"></script>

        <!-- Responsivity for older IE -->
        <!--[if lt IE 9]>
        <script src="{{asset('assets/template/js/respond.min.js')}}"></script>
    <![endif]-->

        <meta property="og:title" content="Landing Page | Landing Page Bootstrap Theme by Bootstrapious.com!">
        <meta property="og:site_name" content="Landing Page | Landing Page Bootstrap Theme by Bootstrapious.com!">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">

        <meta property="og:image" content="">  

        <meta name="twitter:card" content="summary">
        <meta name="twitter:creator" content="">

    </head>

    <body data-spy="scroll" data-target="#navigation" data-offset="120">


        <!-- *** NAVBAR ***
        _________________________________________________________ -->

        <div class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <span class="teal-text">KofoundMe</span>
                    {{--<img alt="KofoundME" height="30px" width="40px" style="border-radius: 10%" src="{{ asset('img/logo.png') }}">--}}
                </a>
                </div>

                <div class="navbar-collapse collapse" id="navigation" >

                    <ul class="nav navbar-nav navbar-right">
                    	@guest
                            <li class="">
                                <a active style="color: #009688;" href="{{route('connections.index')}}">
                                    {{--<i class="mdi mdi-link"></i>--}}
                                    Connect</a>
                            </li>
                            <li class="">
                                <a style="color: teal;" href="{{ route('ideas.idea')}}">Ideas</a>
                            </li>
                            <li><a class="" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                            @else
                                <li class="">
                                    <a active style="color: teal;" href="{{route('messaging.messages')}}">Messaging</a>
                                </li>
                                <li class="">
                                    <a disabled active style="color: teal;" href="{{route('discussions.index')}}">Discuss</a>
                                </li>
                                <li class="">
                                    <a active style="color: teal;" href="{{route('connections.index')}}">Connect</a>
                                </li>
                                <li class="">
                                    <a style="color: teal;" href="{{ route('ideas.idea')}}">Ideas</a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a style="text-transform: capitalize;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->first_name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                <li class="n">
                                    <a style="color: teal;" href="{{ route('profile.view')}}">
                                        <img height="40px" width="60px" style="border-radius: 50%;" src="{{asset(auth()->user()->imagePath())}}">
                                    </a>
                                </li>


                                @endguest
                    </ul>
                </div>
                <!--/.nav-collapse -->

            </div>
        </div>
        <!-- /#navbar -->

        <!-- *** NAVBAR END *** -->


        <div id="all">


            <!-- *** INTRO IMAGE ***
        _________________________________________________________ -->
            <div id="intro" class="clearfix">
                <div class="item" style="margin-top: 80px;">
                    <div class="container">
                        <div class="row">

                            <h1 data-animate="fadeInDown" style="color: teal;" class="teal-text">KofoundMe!</h1>
                            <p  class="message" data-animate="fadeInUp">A Paradigm shift...</p>


                            <div class="col-md-6 col-md-offset-3" data-animate="fadeInUp">
                                <form action="{{route('messaging.join-mail-list')}}" method="post" id="frm-landingPage1" class="form">
                                    @csrf
                                    <div class="input-group">

                                        <input type="text" class="form-control" placeholder="your email address" name="email" id="frm-landingPage1-email" required value="">
                                        @auth
                                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                        @endauth
                                        <span class="input-group-btn">

                                            <input class="btn btn-default" type="submit" value="Submit" name="_submit" id="frm-landingPage1-submit">

                                        </span>

                                    </div>
                                    <!-- /input-group -->
                                </form>

                                <p class="text-small">Join our mailing list.</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- *** INTRO IMAGE END *** -->



            <!-- *** SERVICES ***
        _________________________________________________________ -->
            <div class="section" id="section1">
                <div class="container">
                    <div class="col-md-12">
                        <h2 class="title" style="padding-top: 60px;" data-animate="fadeInDown">The KofoundME Advantage.</h2>

                        <div class="row services">

                            <div class="col-md-4" data-animate="fadeInUp">
                                <div class="icon"><i style="color: #009688;" class="fa fa-group"></i>
                                </div>
                                <h3 class="heading">Find new insights for your Ideas</h3>
                                <p>You have a great idea, see what others might think about it. </p>
                            </div>

                            <div class="col-md-4" data-animate="fadeInUp">
                                <div class="icon"><i style="color:red;" class="fa fa-link"></i>
                                </div>
                                <h3 class="heading">Find a Co-founder</h3>
                                <p>Every good idea needs people with the right skills,  We link you to the people you need to make your company succeed. </p>
                            </div>

                            <div class="col-md-4" data-animate="fadeInUp">
                                <div class="icon"><i style="color: #2ca02c;" class="fa fa-briefcase"></i>
                                </div>
                                <h3 class="heading">Showcase your Skills</h3>
                                <p>You have amazing skills, there are people looking for individuals just like you. Show your skills and be in demand. </p>
                            </div>

                        </div>
                       <!-- <div class="row services">

                            <div class="col-md-4" data-animate="fadeInUp">
                                <div class="icon"><i class="fa fa-bullhorn"></i>
                                </div>
                                <h3 class="heading">We will propagate your stuff</h3>
                                <p>Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack.</p>
                            </div>

                            <div class="col-md-4" data-animate="fadeInUp">
                                <div class="icon"><i class="fa fa-desktop"></i>
                                </div>
                                <h3 class="heading">Responsive web and app</h3>
                                <p>Quick wafting zephyrs vex bold Jim. Quick zephyrs blow, vexing daft Jim. </p>
                            </div>

                            <div class="col-md-4" data-animate="fadeInUp">
                                <div class="icon"><i class="fa fa-heart-o"></i> 
                                </div>
                                <h3 class="heading">Dedicated support team</h3>
                                <p>Quick, Baz, get my woven flax jodhpurs! "Now fax quiz Jack!" my brave ghost pled. </p>
                            </div>

                        </div> -->

                    </div>
                    <!-- /.12 -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.section -->

            <!-- *** SERVICES END *** -->


            <!-- *** ABOUT US ***
        _________________________________________________________ -->

            <div class="section  text-gray" id="section2">
                <div class="container">
                    <div class="col-md-12">


                        <!-- <h2 class="title" data-animate="fadeInDown">About us</h2>

                        <div class="row">

                            <div class="col-md-8 col-md-offset-2">

                                <p class="text-large text-thin"  data-animate="fadeInUp">Five quacking zephyrs jolt my wax bed. Flummoxed by job, kvetching W. zaps Iraq. Cozy sphinx waves quart jug of bad milk. </p>
                                <p class="text-large text-thin margin-bottom"  data-animate="fadeInUp">A very bad quack might jinx zippy fowls. Few quips galvanized the mock jury box. Quick brown dogs jump over the lazy fox. The jay, pig, fox, zebra, and my wolves quack! Blowzy red vixens fight for a quick jump. Joaquin Phoenix was gazed by MTV for luck. A wizard’s job is to vex chumps quickly in fog. Watch "Jeopardy!", Alex Trebek's fun TV quiz game. Woven silk pyjamas exchanged for blue quartz.</p>

                                <p   data-animate="fadeInUp"><img src="img/team.jpg" alt="" class="img-circle img-responsive ondra-michal"></p>

                            </div>

                        </div> -->

                    </div>
                    <!-- /.12 -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.section -->

            <!-- *** ABOUT US END *** -->

            <!-- *** JOIN US ***
        _________________________________________________________ -->

            <div class="section" data-animate="bounceIn">
                <div class="container">
                    <div class="col-md-8 col-md-offset-2">


                        <h2 class="title">Join us for the fun!</h2>

                     <!--    <p class="lead margin-bottom">Blowzy red vixens fight for a quick jump. Joaquin Phoenix was gazed by MTV for luck. A wizard’s job is to vex chumps quickly in fog. Watch "Jeopardy! ", Alex Trebek's fun TV quiz game. Woven silk pyjamas exchanged for blue quartz. Brawny gods just.</p>


                        <div class="row">

                            <div class="col-md-8 col-md-offset-2">


                                <form action="#" method="post" id="frm-landingPage2" class="form">
                                    <div class="input-group">

                                        <input type="text" class="form-control" placeholder="your email address" name="email" id="frm-landingPage2-email" required value="">

                                        <span class="input-group-btn">

                                            <input class="btn btn-default" type="submit" value="Submit" name="_submit" id="frm-landingPage2-submit">

                                        </span>

                                    </div>
                                    /input-group 
                                </form>
                            </div>
                        </div> -->

                    </div>
                    <!-- /.12 -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.section -->

            <!-- *** JOIN US END *** -->      

            <!-- *** TESTIMONIALS ***
_________________________________________________________ -->

            <div class="section text-gray" id="section3" data-animate="fadeInUp">

                <div class="container">
                    <div class="col-md-12">

                        <div class="mb20">
                            <h2 class="title" data-animate="fadeInUp">Customers said about us</h2>

                          <!--   <p class="lead text-center" data-animate="fadeInUp">Quick, Baz, get my woven flax jodhpurs! "Now fax quiz Jack!" my brave ghost pled. </p> 
                        </div>

                        <ul class="owl-carousel testimonials same-height-row" data-animate="fadeInUp">
                            <li class="item">
                                <div class="testimonial same-height-always">
                                    <div class="text">
                                        <p>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections.</p>
                                    </div>
                                    <div class="bottom">
                                        <div class="icon"><i class="fa fa-quote-left"></i></div>
                                        <div class="name-picture">
                                            <img class="" alt="" src="img/person-1.jpg">
                                            <h5>John McIntyre</h5>
                                            <p>CEO, TransTech</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="testimonial same-height-always">
                                    <div class="text">
                                        <p>The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What's happened to me? " he thought. It wasn't a dream.</p>
                                    </div>
                                    <div class="bottom">
                                        <div class="icon"><i class="fa fa-quote-left"></i></div>
                                        <div class="name-picture">
                                            <img class="" alt="" src="img/person-2.jpg">
                                            <h5>John McIntyre</h5>
                                            <p>CEO, TransTech</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="testimonial same-height-always">
                                    <div class="text">
                                        <p>His room, a proper human room although a little too small, lay peacefully between its four familiar walls.</p>

                                        <p>A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame.</p>
                                    </div>
                                    <div class="bottom">
                                        <div class="icon"><i class="fa fa-quote-left"></i></div>
                                        <div class="name-picture">
                                            <img class="" alt="" src="img/person-3.jpg">
                                            <h5>John McIntyre</h5>
                                            <p>CEO, TransTech</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="testimonial same-height-always">
                                    <div class="text">
                                        <p>It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather. Drops of rain could be heard hitting the pane, which made him feel quite sad.</p>
                                    </div>

                                    <div class="bottom">
                                        <div class="icon"><i class="fa fa-quote-left"></i></div>
                                        <div class="name-picture">
                                            <img class="" alt="" src="img/person-4.jpg">
                                            <h5>John McIntyre</h5>
                                            <p>CEO, TransTech</p>
                                        </div>
                                    </div>
                                </div> 
                            </li>
                            <li class="item">
                                <div class="testimonial same-height-always">
                                    <div class="text">
                                        <p>It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather. Drops of rain could be heard hitting the pane, which made him feel quite sad. Gregor then turned to look out the window at the dull weather. Drops of rain could be heard hitting the pane, which made him feel quite sad.</p>
                                    </div>

                                    <div class="bottom">
                                        <div class="icon"><i class="fa fa-quote-left"></i></div>
                                        <div class="name-picture">
                                            <img class="" alt="" src="img/person-4.jpg">
                                            <h5>John McIntyre</h5>
                                            <p>CEO, TransTech</p>
                                        </div>
                                    </div>
                                </div> 
                            </li>
                        </ul> -->
                         <!-- /.owl-carousel -->
                    </div> <!-- /.12 -->
                </div> <!-- /.container -->

            </div><!-- /.section -->	

            <!-- *** TESTIMONIALS END *** -->

            <!-- *** CONTACT ***
        _________________________________________________________ -->

            {{--<div class="section" id="section4" >--}}
                {{--<div class="container">--}}
                    {{--<div class="col-md-8 col-md-offset-2">--}}


                        {{--<h2 class="title" data-animate="fadeInDown">Contact us</h2>--}}

                        {{--<!-- <p class="lead margin-bottom" data-animate="fadeInUp">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>--}}
 {{---->--}}

                        {{--<ul class="list-unstyled text-large text-thin" data-animate="fadeInUp">--}}
                            {{--<li><strong>E-mail:</strong> support@kofoundme.com</li>--}}
                            {{--<li><strong>Phone:</strong> </li>--}}
                        {{--</ul>--}}

                    {{--</div>--}}
                  {{----}}
                {{--</div>--}}
               {{----}}
            {{--</div>--}}




            <!-- *** FOOTER ***
        _________________________________________________________ -->

            <div class="section" id="footer">
                <div class="container">

                    <div class="row">

                        <div class="col-sm-6">

                            <p class="social">
                                <a href="#" class="external facebook" data-animate-hover="shake" data-animate="fadeInUp"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="external instagram" data-animate-hover="shake" data-animate="fadeInUp"><i class="fa fa-instagram"></i></a>
                                <a href="#" class="external twitter" data-animate-hover="shake" data-animate="fadeInUp"><i class="fa fa-twitter"></i></a>
                                <a href="mailto:#" class="email" data-animate-hover="shake" data-animate="fadeInUp"><i class="fa fa-envelope"></i></a>
                            </p>
                        </div>
                        <!-- /.6 -->

                        <div class="col-sm-6">
                            <p>&copy; 2018 KofoundME. 
                        </div>

                    </div>

                </div>
                <!-- /.container -->
            </div>
            <!-- /.section -->

            <!-- *** FOOTER END *** -->
        </div>

        <!-- js base -->
        <script src="{{asset('assets/template/js/jquery-1.11.0.min.js')}}"></script>
        <script src="{{asset('assets/template/js/bootstrap.min.js')}}"></script>


        <!-- waypoints for scroll spy -->
        <script src="{{asset('assets/template/js/waypoints.min.js')}}"></script>

        <!-- owl carousel -->
        <script src="{{asset('assets/template/js/owl.carousel.min.js')}}"></script>        

        <!-- jQuery scroll to -->
        <script src="{{asset('assets/template/js/jquery.scrollTo.min.js')}}"></script>

        <!-- main js file -->

        <script src="{{asset('assets/template/js/front.js')}}"></script>        
        </div>

    </body>
</html>