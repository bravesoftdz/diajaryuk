@extends('layouts.user')

@section('content')
    
   
    <div class="container" id="play">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Contact Me</h2>
                <hr class="star-primary">
            </div>
        </div>
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
            <div class="card" @click="cardOnClick(module)" :modules="modules" v-for="module in modules" >  
                <div class="card-header"> @{{ module.name }} </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col-md-3">
                            <img class="img-responsive" v-if="!module.image_path" :src="module.image_path" >
                        </div>
                        <div class="col-md-9"> <label>@{{ module.name }}</label> </div>
                    </div>
                </div>
            </div>
        </div>
    </template>

    <template id="materies-template">
        <div>
            <div class="card-deck" :materies="materies" >
                <div class="card" v-if="matery.module_id == id"  v-for="matery in materies" @click="cardOnClick(matery)" >
                        <div class="card-header" v-if="matery.module.name" > @{{ matery.module.name }} </div>
                        <div class="card-content">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1 ">
                                    @{{ matery.title }}
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </template>

    <template id="matery-template" >
        <div class="card" @click="cardOnClick">
            <div class="card-header">
                @{{matery.title}}
            </div>
            <div class="card-content">
                <span> @{{matery.content}} </span> 
            </div>
        </div>
    </template>


@endsection