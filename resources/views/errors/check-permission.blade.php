<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/app.css" rel="stylesheet">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>

<div class="container text-center">
	<h1>You don't have permission for access this page <br/> Please contact you Superadmin!</h1>
</div>

</body>
</html> -->

@extends('layouts.user')

@section('content')

<div class="container-fluid" >
	<div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                            <h3>English Course</h3>
                    </div>

                    <div class="panel-body text-center">
                    	<h4>Ooopsss Sorry!</h4>
                        <h4>You dont have right to access this pages</h4>
                    	<h4><a href="{{ url('/') }}">Let's Go back !</a> </h4>
                    	
                    </div>

                </div>
            </div>
        </div>
</div>


@endsection