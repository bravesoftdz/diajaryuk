@extends('layouts.admin')

@section('content')

<!-- <div class="container"> -->
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Matery</div>

                <div class="panel-body">
                    <div class="form-horizontal">
                    <div class="form-group">
                        
                        <!-- <label for="title" class="col-md-4 control-label">Title</label> -->
                        <div class="col-md-6">
                            <input type="input" id="title" class="form-control" placeholder="e.g Title">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea class="form-control" rows="9" id="content" placeholder="e.g Content Goes Here"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <select id="module_id" class="form-control" >
                                
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <button class="btn btn-success">
                                SAVE
                            </button>
                        </div>
                    </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
<!-- </div> -->
@endsection
