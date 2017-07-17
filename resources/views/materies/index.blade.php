@extends('layouts.admin')

@section('content')


<div id="materies"></div>

<script type="text/template" id="materies_index">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <!-- <div class="row"> -->
                        <div class="row">
                            <div class="col-md-12">
                                Matery        
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <a href="#create" class="btn btn-success">
                                    Add
                                </a>        
                            </div>
                        </div>
                        
                        
                    <!-- </div> -->
                </div>

                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Module</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th colspan="2">Actions</th>
                                
                            </tr>
                        </thead>
                        <tbody id="listPlace">
                                
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
                        
                        <div class="col-md-6">
                            <% if( typeof(model) !== 'undefined' ){ %>
                                <input type="input" id="title" class="form-control" placeholder="e.g Title" value="<%= model.title %>" >
                            <% }else{ %>
                                <input type="input" id="title" class="form-control" placeholder="e.g Title"  >
                            <% } %>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-12">
                            <% if( typeof(model) !== 'undefined' ){ %>
                                <div id="content" class="ql-editor ql-blank"><%= model.content %></div>
                            <% }else{ %>
                                <div id="content" class="ql-editor ql-blank"></div>
                            <% } %>
                            
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

<script type="text/template" id="materies_item">
    
        <td> <%= data.id %> </td>
        <td> <%= data.title %> </td>
        <td class="pre-scrollable"> <%= data.content %> </td>
        <td> <%= module.name %> </td>
        <td> <%= data.created_at %> </td>
        <td> <%= data.updated_at %> </td>
        <td><button id="btnEdit" class="btn btn-success form-control">Edit</button></td>
        <td><button id="btnDelete" class="btn btn-danger form-control">Delete</button></td>
    
</script>



@endsection
