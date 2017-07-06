@extends('layouts.admin')

@section('content')

<!-- <div class="container"> -->
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <!-- <div class="row"> -->

                        <!-- <h3 class="col-md-4 title"> Matery </h3> -->
                        Comments
                    <!-- </div> -->
                </div>

                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>User</th>
                                <th>Matery id</th>
                                <th>Try out Id</th>
                                <th>Created at</th>
                                <th>Comment</th>
                                <th>Created at</th>
                                <th>Updated at</th>
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
