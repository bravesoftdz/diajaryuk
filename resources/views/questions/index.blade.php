@extends('layouts.admin')

@section('content')

<!-- <div class="container"> -->
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <!-- <div class="row"> -->

                        <!-- <h3 class="col-md-4 title"> Matery </h3> -->
                        Questions
                    <!-- </div> -->
                </div>

                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>type</th>
                                <th>question</th>
                                <th>answer 1</th>
                                <th>answer 2</th>
                                <th>answer 3</th>
                                <th>answer 4</th>
                                <th>point</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!-- </div> -->
@endsection
