@extends('layouts.user')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Contact Me</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                            Welcome
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img class="img-responsive" src="img/profile.png" alt="">
                            </div>
                            <div class="col-md-8">
                                
                                <p>Hai, Selamat Datang!</p>

                                <p>Perkenalkan, saya mang ujang. dari sini, saya akan memandu teman-teman semua untuk belajar bahasa inggris dengan cara yang baru. cara yang lebih elegant, modern, dan menyenangkan. Silahkan klik tombol next untuk melihat konten pembelajaran yang akan ada pelajari. Selamat bersenang-senang! hohoho ... </p>
                                 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 pull-right">
                                <!-- <button class="btn btn-success form-control"> NEXT </button> -->
                                <a class="btn btn-success form-control" href="{{url('/course')}}"> NEXT </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <example></example>
@endsection