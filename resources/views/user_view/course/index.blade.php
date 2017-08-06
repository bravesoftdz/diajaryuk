@extends('layouts.user')

@section('content')
    
    <script src="{{ url('/scripts/modules/course/overview/itemView.js') }}"></script>
    <script src="{{ url('/scripts/modules/course/overview/listView.js') }}"></script>
    
    <div class="container">
        <!-- <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Contact Me</h2>
                <hr class="star-primary">
            </div>
        </div> -->
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                            <h3>Welcome</h3>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="{{ url('/play') }}">
                                <img class="img-responsive" src=" {{ url('img/profile.png')}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-8">
                                <h3>Course Overview</h3>
                            </div>
                            <div class="col-md-7 pre-scrollable">
                                    
                                    <table class="table table-striped table-bordered table-hover" id="overview">
                                        <tr>
                                            <th></th>
                                        </tr>
                                    </table>
                                 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 pull-right">
                                <!-- <button class="btn btn-success form-control"> NEXT </button> -->
                                <a class="btn btn-success form-control" href="{{ url('/play') }}"> NEXT </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        (function(){
            new app.views.overview.list({
                el: $("#overview"),
                collection: {
                    modules: app.collections.modules,
                    materies: app.collections.materies
                }
            });
        })()
    </script>

    <script type="text/template" id="course_item" >
        <td><%= modules.name %></td>
    </script>

@endsection