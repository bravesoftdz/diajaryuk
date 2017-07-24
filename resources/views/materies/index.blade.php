@extends('layouts.admin')

@section('content')


<div id="materies"></div>

<div id="materies_place">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">
                            Matery        
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <!-- <a href="#materies/create" class="btn btn-success">
                                Add
                            </a>  -->
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
                              Create Matery
                            </button>       
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Module</th>
                                <th colspan="2">Actions</th>
                                
                            </tr>
                        </thead>
                        <tbody id="matery_item">
                            <tr :materies.sync="materies" v-for="matery in materies" is="matery-item" :id='matery.id' :materies='materies' :matery="matery"  ></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="myModalLabel">Create Item</h4>
          </div>
          <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="store">                    
                    <div class="form-group" >
                        <label> Title </label>
                        <input type="input" class="form-control" v-model="newMatery.title">
                    </div>

                    <div class="form-group" >
                        <label> Content </label>
                        <!-- <div id="content" class="ql-editor ql-blank" v-model="newMatery.content"></div> -->
                        <input type="input" id="content" class="ql-editor ql-blank col-md-12" v-model="newMatery.content" >
                    </div>

                    <div class="form-group" >
                        <label> Question </label>
                        <select class="form-control" v-model="newMatery.module_id" >
                            <option v-for="module in modules" :value="module.id" > @{{ module.name }} </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>

                </form>
          </div>
        </div>
      </div>
    </div>
</div>


<template>
    <td> @{{ id }} </td>
    <td> @{{ title }} </td>
    <td class="pre-scrollable"> <pre> @{{ content }} </pre></td>
    <td> @{{ module.name }} </td>
    <td><button id="btnEdit" class="btn btn-success form-control">Edit</button></td>
    <td><button id="btnDelete" class="btn btn-danger form-control">Delete</button></td>
</template>

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
                                <a href="#materies/create" class="btn btn-success">
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
