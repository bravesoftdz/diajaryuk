@extends('layouts.admin')

@section('content')

<!-- <div class="container"> -->
<div id="quizzes_place"> 
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">
                            Quizes
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
                              Create Quizes
                            </button>
                        </div>
                        
                    </div>
                </div>
                

                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Module Id</th>
                                <th>Question Id</th>
                                <th colspan="2">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="quiz_item" >
                            <tr :quizzes.sync="quizzes" v-for="quiz in quizzes" is="quiz-item" :id='quiz.id' :quizzes='quizzes' :quiz="quiz" :module="quiz.module.name" :question="quiz.question.question"></tr>
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
                        <label> Module </label>
                        <select class="form-control" :modules="modules" v-model="newQuiz.module_id" >
                            <option v-for="module in modules" :value="module.id"> @{{ module.name }} </option>
                        </select>
                    </div>

                    <div class="form-group" >
                        <label> Question </label>
                        <select class="form-control" :questions="questions" v-model="newQuiz.question_id" >
                            <option v-for="question in questions" :value="question.id" > @{{ question.question }} </option>
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

<template id="quiz-item-template">
    <tr>
        <td> @{{ id }}</td>
        <td> @{{ module }}</td>
        <td> @{{ question }}</td>
        <td><button class="btn btn-success form-controll" @click="editOnClick(quiz)" > EDIT </button></td>
        <td><button class="btn btn-danger form-controll" @click="deleteOnClick(quiz)" > DELETE </button></td>     
    </tr>           
</template>
<!-- </div> -->
@endsection
