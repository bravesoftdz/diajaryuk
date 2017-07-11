@extends('layouts.admin')

@section('content')



<div id="materies"></div>

<script type="text/template" id="materies_index">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <!-- <div class="row"> -->

                        <!-- <h3 class="col-md-4 title"> Matery </h3> -->
                        Matery
                        <!-- <button type="submit" id="add" class="btn btn-success">
                            <i class="material-icons">add</i>
                            <div class="ripple-container"></div>
                        </button> -->
                        <a href="#create" class="btn btn-success">
                            Add
                        </a>
                        
                    <!-- </div> -->
                </div>

                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Module Id</th>
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
</script>

<script type="text/template" id="materies_create">
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
                            <!-- <textarea class="form-control" rows="9" id="content" placeholder="e.g Content Goes Here"></textarea> -->
                            <div id="content" class="ql-editor ql-blank"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <select id="module_id" class="form-control" >
                                <% for(var i = 0; i < modules.length; i++){ %>
                                    <option value="<%= modules.models[i].get('id') %>"><%= modules.models[i].get('name')  %></option>
                                <% } %>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <button class="btn btn-success" id="btnSave">
                                SAVE
                            </button>
                        </div>
                    </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

</script>

@endsection
