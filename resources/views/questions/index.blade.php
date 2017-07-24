@extends('layouts.admin')

@section('content')

<!-- <div class="container"> -->
<div id="question_place">
    <div class="row" >
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">
                            Question
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
                              Create Questions
                            </button>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead >
                            <tr>
                                <th>id</th>
                                <!-- <th>type</th> -->
                                <th>question</th>
                                <th colspan="2">Actions</th>
                                
                                
                            </tr>
                        </thead>
                        <tbody id="question_item" >
                            <tr :questions.sync="questions" v-for="question in questions" is="question-item" :id='question.id' :questions='questions' :question="question" :name='question.question' ></tr>
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

                    <!-- <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" class="form-control" v-model="newItem.title" />
                        <span v-if="formErrors['title']" class="error text-danger">@{{ formErrors['title'] }}</span>
                    </div>

                    <div class="form-group">
                        <label for="title">Description:</label>
                        <textarea name="description" class="form-control" v-model="newItem.description"></textarea>
                        <span v-if="formErrors['description']" class="error text-danger">@{{ formErrors['description'] }}</span>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div> -->

                    <div class="form-group">
                        <label for="title">Question:</label>
                        <textarea name="txtquestion" class="form-control" v-model="newQuestion.question"></textarea>
                        <!-- <span v-if="formErrors['description']" class="error text-danger">@{{ formErrors['description'] }}</span> -->
                    </div>

                    <div class="form-group" >
                        <label><input type="radio" name="answer" v-model="newQuestion.answer_1" > Jawaban A </label>
                        <input v-model="newQuestion.answer_1" type="input" class="form-control">
                    </div>

                    <div class="form-group" >
                        <label><input type="radio" name="answer" v-model="newQuestion.answer_2" > Jawaban B </label>
                        <input v-model="newQuestion.answer_2" type="input" class="form-control">
                    </div>

                    <div class="form-group" >
                        <label><input type="radio" name="answer" v-model="newQuestion.answer_3"> Jawaban C </label>
                        <input v-model="newQuestion.answer_3" type="input" class="form-control">
                    </div>

                    <div class="form-group" >
                        <label><input type="radio" name="answer" v-model="newQuestion.answer_4"> Jawaban D </label>
                        <input v-model="newQuestion.answer_4" type="input" class="form-control">
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

<template id="question-item-template">
    <tr>
        <td> @{{ id }}</td>
        <td> @{{ name }}</td>
        <td><button class="btn btn-success form-controll" @click="editOnClick(question)" > EDIT </button></td>
        <td><button class="btn btn-danger form-controll" @click="deleteOnClick(question)" > DELETE </button></td>     
    </tr>           
</template>
<!-- </div> -->
@endsection
