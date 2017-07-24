@extends('layouts.admin')

@section('content')

<!-- <div class="container"> -->
<div id="try_out_place"> 
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">
                            Try Outs
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
                              Create Try out
                            </button>
                        </div>
                        
                    </div>
                </div>
                

                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Materi Id</th>
                                <th>Question Id</th>
                                <th colspan="2">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="try_out_item" >
                            <tr :try_outs.sync="try_outs" v-for="try_out in try_outs" is="try_out-item" :id='try_out.id' :try_outs='try_outs' :try_out="try_out" :materi='try_out.matery_id' :question="try_out.question_id"></tr>
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
                        <label> Materi </label>
                        <select class="form-control" :materies="materies" v-model="newTryOut.matery_id" v-for="materi in materies">
                            <option :value="materi.id"> @{{ materi.title }} </option>
                        </select>
                    </div>

                    <div class="form-group" >
                        <label> Question </label>
                        <select class="form-control" :questions="questions" v-model="newTryOut.question_id" v-for="question in questions" >
                            <option :value="question.id" > @{{ question.question }} </option>
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

<template id="try_out-item-template">
    <tr>
        <td> @{{ id }}</td>
        <td> @{{ materi }}</td>
        <td> @{{ question }}</td>
        <td><button class="btn btn-success form-controll" @click="editOnClick(try_out)" > EDIT </button></td>
        <td><button class="btn btn-danger form-controll" @click="deleteOnClick(try_out)" > DELETE </button></td>     
    </tr>           
</template>
<!-- </div> -->
@endsection
