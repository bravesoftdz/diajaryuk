@extends('layouts.admin')

@section('content')

<div class="row" id="module-index" >
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
                            <th>name</th>
                            <th colspan="2">Actions</th>
                        </tr>

                    </thead>
                    <tbody id="item-place" >
                        	<tr :modules.sync="modules" v-for="module in modules" is="module-item" :id='module.id' :modules='modules' :module='module' :name = 'module.name' ></tr>
                    </tbody>
                </table>

  

                
                
            </div>
        </div>
    </div>
</div>

<template id="module-item-template">
	<tr>
        <td> @{{ id }}</td>
    	<td> @{{ name }}</td>
    	<td><button class="btn btn-success form-controll" @click="editOnClick(module)" > EDIT </button></td>
    	<td><button class="btn btn-danger form-controll" @click="deleteOnClick(module)" > DELETE </button></td>    	
	</tr>    		
</template>

<template id="modal-template" >
	
</template>


@endsection
