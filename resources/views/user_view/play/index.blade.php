@extends('layouts.user')

@section('content')
    
    <!-- langsung muncul -->   
    <div class="container" id="play">
        <!-- <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Contact Me</h2>
                <hr class="star-primary">
            </div>
        </div> -->
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                            <h3>English Course</h3>
                    </div>

                    <div class="panel-body">
                        <router-view></router-view>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <template id="user-module-item-template" >
        <div >
            <div class="card text-center" @click="cardOnClick(module)" :modules="modules" v-for="module in modules" >  
                <div class="card-header"> @{{ module.name }} </div>
                <div class="card-block">
                    <img class="img-responsive" v-if="!module.image_path" :src="module.image_path" >
                    <h4 class="card-title"> @{{ module.name }} </h4>
                </div>
            </div>
            <div class="card text-center" >
                <div class="card-header" > FINISH </div>
                <div class="card-block">
                    <h4 class="card-title"> <a href="{{ route('certificate') }}"> Print Certificate! </a> </h4>
                </div>
            </div>
        </div>
    </template>

    <!-- saat matery di render judulnya saja -->
    <template id="materies-template">
        <div >
            <div class="card-deck" :materies="materies" >
                <div class="card text-center" v-if="matery.module_id == id"  v-for="matery in materies" @click="cardOnClick(matery)" >
                        <div class="card-header" v-if="matery.module.name" > @{{ matery.module.name }} </div>
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1 ">
                                    <h4 class="card-title"> @{{ matery.title }} </h4> 
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </template>
    <!-- saat matery disajikan -->
    <template id="matery-template" >
        <div class="card" >
            <div class="card-header">
                <h4 class="card-title"> @{{ matery.title }} </h4>
            </div>
            <div class="card-block d-flex">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="card-text">  <div v-html="matery.content" ></div> </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <a href="#" @click.prevent="commentOnClick" >Comment</a>
                        </div>
                        <div class="col-md-6">
                            <button @click="nextOnClick" class="btn btn-success pull-right">NEXT</button>
                            <!-- <router-link :to="/try_out"></router-link> -->
                        </div>
                    </div>
                    <!-- <pre> @{{comments}} </pre> -->
                </div>
                    <!-- parents -->

                    <!-- <app-comment :id="matery.id"   v-if="show_comments" ></app-comment> -->
                    <!-- cooments dibawah adalah comment dari matery -->
                    <app-comments  :matery_id="matery.id" v-if="show_comments" :user_id="{{ Auth::user()->id }}"   ></app-comments>
                    
                    <!-- :user_id="@{{ Auth::user()->id }}" -->
            </div>
        </div>
    </template>

    <template id="tryout-template">
        <div class="card" >
            <div class="card-header">
                <h4 class="card-title">Try out</h4>
            </div>
            <div class="card-block d-flex">
                <div class="container-fluid">
                    <div class="row">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="card-text">  <pre><div v-html="try_out.question.question" ></div></pre> </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- <div class="row"> -->
                        <div class="col-md-12">
                            <!-- <p class="card-text">  <div v-html="try_out.question.question" ></div> </p> -->
                            <div class="row">
                                <div class="col-md-6">
                                    <label><input type="radio" name="answer" :value=try_out.question.answer_1 v-model='answer' > @{{ try_out.question.answer_1 }} </label>
                                </div>
                                <div class="col-md-6">
                                    <label><input type="radio" name="answer" :value=try_out.question.answer_2 v-model='answer' > @{{ try_out.question.answer_2 }} </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label><input type="radio" name="answer" :value=try_out.question.answer_3 v-model='answer' > @{{ try_out.question.answer_3 }} </label>        
                                </div>
                                <div class="col-md-6">
                                    <label><input type="radio" name="answer" :value=try_out.question.answer_4 v-model='answer' > @{{ try_out.question.answer_4 }}</label>        
                                </div>
                            </div>
                            
                        </div>
                        <!-- </div> -->
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <a href="#"  @click.prevent="commentOnClick" >Comment</a>
                        </div>
                        <div class="col-md-6">
                            <button @click="nextOnClick" class="btn btn-success pull-right">NEXT</button>
                        </div>
                    </div>
                    <!-- <pre> @{{comments}} </pre> -->
                </div>
                    <!-- parents -->

                    <!-- <app-comment  v-if="show_comments" ></app-comment> -->
                    <!-- <app-comments :comments="comments" v-if="show_comments" ></app-comments> -->
                    <app-comments  :try_out_id="try_out.id" v-if="show_comments" :user_id="{{ Auth::user()->id }}"   ></app-comments>
                    
                    <!-- :user_id="@{{ Auth::user()->id }}" -->
            </div>
        </div>
    </template>

    <!-- tempat input comment -->
    <!-- <template id="comment-template">
        
        <div class="container-fluid top-buffer">
            
            <div class="row"  >
                <div class="col-lg-12">
                    <div class="card">  
                        <div class="card-block" >
                            
                            <h5 class="card-title">@{{ username }}</h5>
                            
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="quill-editor-example">
                                            
                                            <quill-editor 
                                                ref="myTextEditor"
                                                v-model="newComment.comment"
                                                :options="editorOption"
                                                          >
                                            </quill-editor>
                                            
                                        </div>

                                    </div>
                                    <div class="col-md-12 top-buffer">
                                        
                                        <button  @click="sendComment(id)" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    
    </template> -->

    <!-- saat comment di render -->
    <!-- <template id="comments-template">
        
        <div class="container-fluid top-buffer">
            <div class="row" v-for="comment in comments" >
                <div class="col-lg-12">
                    <div class="card">  
                        <div class="card-block">
                            <h5 class="card-title">@{{ comment.user_id }}</h5>
                             <p class="card-text"> <div v-html="comment.comment" ></div> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
    
    </template> -->
    
    <template id="comments-template">
        
        <div class="container-fluid top-buffer">
            
            <div class="row"  >
                <div class="col-lg-12">
                    <div class="card">  
                        <div class="card-block" >
                            
                            <h5 class="card-title">{{ Auth::user()->name }}</h5>
                            
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="quill-editor-example">
                                            <!-- quill-editor -->
                                            <quill-editor 
                                                ref="myTextEditor"
                                                v-model="newComment.comment"
                                                :options="editorOption"
                                                          >
                                            </quill-editor>
                                            
                                        </div>

                                    </div>
                                    <div class="col-md-12 top-buffer">
                                        <!-- id dibawah adalah matery id -->
                                        <button  @click="sendComment(id)" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row" v-for="comment in comments" >
                <div class="col-lg-12">
                    <div class="card">  
                        <div class="card-block">
                            <h5 class="card-title">@{{ comment.user.name }}</h5>
                             <p class="card-text"> <div v-html="comment.comment" ></div> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </template>



@endsection