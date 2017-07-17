@extends('layouts.user')
@section('content')
    <header>
        <div class="container" id="maincontent" tabindex="-1">
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{ url('/course') }}">
                        <img class="img-responsive" src=" {{ url('img/profile.png')}}" alt="">
                    </a>
                    <div class="intro-text">
                        <h1 class="name">Diajaryuk</h1>
                        <hr class="star-light">
                        <span class="skills">Diajaryuk - Where Learning Become Fun!</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection