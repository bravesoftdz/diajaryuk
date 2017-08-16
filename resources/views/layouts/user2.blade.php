<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Diajaryuk - where learning become fun!</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ url('/css/bootstrap.min.css') }}">
    <link href="{{url('/').'/vendor/bootstrap/css/bootstrap.css'}}" rel="stylesheet">
    <!-- Theme CSS -->
    <link href="{{url('/').'/css/freelancer.min.css'}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/quill.snow.css') }}">
    <!-- Custom Fonts -->
    <link href="{{url('/').'/vendor/font-awesome/css/font-awesome.min.css'}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">   
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <style type="text/css">
        .top-buffer { margin-top:20px; }
    </style>
</head>

<body id="page-top" class="index">
        <!-- jQuery -->
    <script src="{{ url('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('/node_modules/vue-quill-editor/dist/index.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src=" {{url('/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="{{ url('js/jqBootstrapValidation.js')}}"></script>
    <script src="{{url('js/contact_me.js')}}"></script>

    <!-- Theme JavaScript -->
    <script src="{{url('js/freelancer.min.js')}}"></script>

    <!-- bower components -->
    <script src="{{url('/')}} /bower_components/underscore/underscore.js"></script>
    <script src="{{url('/')}} /bower_components/backbone/backbone.js"></script>
    <script src="{{ url('/bower_components/vue/dist/vue.js') }}"></script>
    <script src="{{ url('/bower_components/vue-router/dist/vue-router.js') }}"></script>
    
    <!-- main scripts -->
    <!-- <script src="{{ url('/scripts/modules').'/materies/models/model.js' }}"></script>
    <script src="{{ url('/scripts/modules/materies/collections/collection.js') }}"></script>
    <script src="{{ url('/scripts/modules') }} /materies/views/createView.js "></script>
    <script src="{{ url('/scripts/modules/materies/views/itemView.js') }}"></script>
    <script src="{{ url('/scripts/modules/materies/views/listView.js') }}"></script>
    <script src="{{ url('/scripts/modules') }} /materies/views/parentView.js "></script>
    <script src="{{ url('/scripts/modules').'/modules/models/model.js' }}"></script>
    <script src="{{ url('/scripts/modules') }} /modules/collections/collection.js "></script>
     -->
    <script src="{{ url('/scripts/modules').'/materies/models/model.js' }}"></script>
    <script src="{{ url('/scripts/modules/materies/collections/collection.js') }}"></script>
    <script src="{{ url('/scripts/modules').'/modules/models/model.js' }}"></script>
    <script src="{{ url('/scripts/modules') }} /modules/collections/collection.js "></script>
    <script src="{{ url('/scripts/modules').'/questions/models/model.js' }}"></script>
    <script src="{{ url('/scripts/modules') }} /questions/collections/collection.js "></script>
    <script src="{{ url('/scripts/modules').'/answers/models/model.js' }}"></script>
    <script src="{{ url('/scripts/modules') }} /answers/collections/collection.js "></script>
    <script src="{{ url('/scripts/modules').'/try_outs/models/model.js' }}"></script>
    <script src="{{ url('/scripts/modules') }} /try_outs/collections/collection.js "></script>
    <script src="{{ url('/scripts/modules').'/quizzes/models/model.js' }}"></script>
    <script src="{{ url('/scripts/modules') }} /quizzes/collections/collection.js "></script>
    <script src="{{ url('/scripts/modules').'/comments/models/model.js' }}"></script>
    <script src="{{ url('/scripts/modules') }} /comments/collections/collection.js "></script>
    <script src="{{ url('/scripts/modules').'/stages/models/model.js' }}"></script>
    <script src="{{ url('/scripts/modules') }} /stages/collections/collection.js "></script>

    <div id="skipnav"><a href="#maincontent">Skip to main content</a></div>

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top  navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{ url('/course/overview') }}">Start Course</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <!-- <li class="page-scroll">
                        <a href="#portfolio">Portfolio</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">About</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact">Contact</a>
                    </li>
                    <li class="page-scroll">
                        <a href="{{ url('/login') }}">Login</a>
                    </li> -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    
    @yield('content')


    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <script src="{{url('/scripts/modules/course/router.js')}}"></script>


    <script src="{{ url('/js/user.js') }}"></script>
    
</body>

</html>
