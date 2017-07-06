@extends('layouts.admin')

@section('content')

<!-- <div class="container"> -->
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Questions</div>

                <div class="panel-body">
                    <div class="form-horizontal">
                    <div class="form-group">
                        
                        <!-- <label for="title" class="col-md-4 control-label">Title</label> -->
                        <div class="col-md-6">
                            <input type="input" id="question_type" class="form-control" placeholder="e.g PG">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="input" id="question_type" class="form-control" placeholder="e.g What is the correct to be for 'I'? ">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3">
                            <input type="input" id="answer_1" class="form-control"  placeholder="answer_1">
                            <div class="radio">
                              <label><input type="radio" name="correct_answer" id="answer_1_radio">Option 1</label>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <input type="input" id="answer_2" class="form-control" placeholder="answer_2" >
                            <label><input type="radio" name="correct_answer" id="answer_2_radio">Option 2</label>
                        </div>

                        <div class="col-md-3">
                            <input type="input" id="answer_3" class="form-control"  placeholder="answer_3">
                            <label><input type="radio" name="correct_answer" id="answer_3_radio">Option 3</label>
                        </div>

                        <div class="col-md-3">
                            <input type="input" id="answer_4" class="form-control"  placeholder="answer_4">
                            <label><input type="radio" name="correct_answer" id="answer_4_radio">Option 4</label>
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
