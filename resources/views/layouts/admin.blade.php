<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="teguh">

    <title>Diajaryuk - where learning become fun!</title>

    <!-- Bootstrap Core CSS -->

    <!-- <link href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> -->
    <link href="{{ url('/').'/vendor/bootstrap/css/bootstrap.min.css' }}" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.quilljs.com/1.2.6/quill.snow.css"> -->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/quill.snow.css') }}">
    <!-- MetisMenu CSS -->
    <!-- <link href="{{asset('vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet"> -->
    <link href="{{ url('/').'/vendor/metisMenu/metisMenu.min.css' }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ url('/').'/dist/css/sb-admin-2.css'}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href=" {{ url('/').'/vendor/morrisjs/morris.css' }}  " rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ url('/').'/vendor/font-awesome/css/font-awesome.min.css'}}" rel="stylesheet" type="text/css">

    

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Diajaryuk.com</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="{{url('/')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        
                        <li>
                            <a href="{{ url('/admin/modules') }}"><i class="fa fa-table fa-fw"></i> Modules </a>
                        </li>

                        <li>
                            <a href="{{ url('/admin/materies') }}"><i class="fa fa-table fa-fw"></i> Materi</a>
                        </li>
                        <!-- <li>
                            <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Try outs </a>
                        </li> -->
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>Soal<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('/admin/try_outs') }}">Try outs</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/quizzes')}}">Quizzes</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/questions')}}">Questions</a>
                                </li>
                                <!-- <li>
                                    <a href="notifications.html">Notifications</a>
                                </li>
                                <li>
                                    <a href="typography.html">Typography</a>
                                </li>
                                <li>
                                    <a href="icons.html"> Icons</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grid</a>
                                </li> -->
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ADMIN MENU</h1>
                </div>
            </div>
            
            @yield('content')
            
        </div>

    </div>
    <!-- /#wrapper -->
    <!-- <script src="https://cdn.quilljs.com/1.2.6/quill.js"></script> -->
    <script src="{{ url('/js/quill.js') }}"></script>
    <!-- jQuery -->
    <script src="{{ url('/').'/vendor/jquery/jquery.min.js'}}"></script>


    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url('/').'/vendor/bootstrap/js/bootstrap.min.js'}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ url('/').'/vendor/metisMenu/metisMenu.min.js'}}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ url('/').'/vendor/raphael/raphael.min.js'}}"></script>
    <script src="{{ url('/').'/vendor/morrisjs/morris.min.js'}} "></script>
    <script src="{{ url('/').'/data/morris-data.js'}}"></script>

    <!-- <script src="https://unpkg.com/vue"></script> -->

    <!-- Custom Theme JavaScript -->
    <script src="{{ url('/').'/dist/js/sb-admin-2.js'}}"></script>
    
    <!-- bower components -->
    <script src="{{url('/')}} /bower_components/underscore/underscore.js"></script>
    <script src="{{url('/')}} /bower_components/backbone/backbone.js"></script>
    <script src="{{ url('/bower_components/vue/dist/vue.js') }}"></script>
    
    <!-- main scripts -->
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
    
    <script src="{{ url('/scripts/modules') }} /materies/views/createView.js "></script>
    <script src="{{ url('/scripts/modules/materies/views/itemView.js') }}"></script>
    <script src="{{ url('/scripts/modules/materies/views/listView.js') }}"></script>
    <script src="{{ url('/scripts/modules') }} /materies/views/parentView.js "></script>

    <!-- vue modules -->
    <script src="{{ url('/scripts/modules/app.js') }}"></script>

    
    
    <script src="{{ url('/scripts/modules') }} /materies/routers/router.js"></script>
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
    

</body>

</html>
