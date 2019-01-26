
@extends('layouts.app')
@section('content')
        <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: tan;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .links > a {
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

    </style>
</head>
<body>
<h1>Edit</h1>
<div class="panel-body">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form method="post" action="{{action('SportEventController@update' , $id )}}">
            <div class="form-group row">
                {{csrf_field()}}
                <input name="_method" type = "hidden" value = "PATCH">
                <label for="sportEventName" class="col-sm-2 col-form-label col-form-label-lg">Sport Event Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput1" placeholder="Enter name:" name="sportEventName" value="{{$sportEvent->sportEventName}}">
                </div>
            </div>
            <div class="form-group row">
                {{csrf_field()}}
                <label for="organizerName" class="col-sm-2 col-form-label col-form-label-lg">Organizer Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput6" placeholder="Enter name" name="oranizerName">
                </div>
            </div>
            <div class="form-group row">
                {{csrf_field()}}
                <label for="date" class="col-sm-2 col-form-label col-form-label-lg">Date</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput2" placeholder="Date" name="conDate">
                </div>
            </div>

            <div class="form-group row">
                {{csrf_field()}}
                <label for="type" class="col-sm-2 col-form-label col-form-label-lg">Type</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput5" placeholder="type:" name="type">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2"></div>
                <input type="submit" class="btn btn-primary">
                <div class="col-xl-1"></div>
                <a class="btn btn-primary" href="{{ route('sportsEvents.index') }}"> Back</a>
            </div>
        </form>
</div>


</body>
</html>
@endsection