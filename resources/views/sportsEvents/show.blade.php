
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
<h1>INDEX</h1>
<div class="panel-body">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Sports Events</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('sportsEvents.index') }}"> Back</a>
            </div>
        </div>
    </div>
</div>
<table class="table table-bordered table-hover" style="width: 70%">
    <tr>
        <td width="20%">
            <strong>Sport Event name:</strong>
        </td>
        <td>
            {{ $sportEvent->sportEventName }}
        </td>
    </tr>
    <tr>
        <td width="20%">
            <strong>Organizer Name:</strong>
        </td>
        <td>
            {{ $sportEvent->organizerName }}
        </td>
    </tr>
    <tr>
        <td width="20%">
            <strong>Date:</strong>
        </td>
        <td>
            {{ $sportEvent->date }}
        </td>
    </tr>

    <tr>
        <td width="20%">
            <strong>Continuance:</strong>
        </td>
        <td>
            {{ $sportEvent->continuance }}
        </td>
    </tr>
    <tr>
        <td width="20%">
            <strong>Type:</strong>
        </td>
        <td>
            {{ $sportEvent->type }}
        </td>
    </tr>
</table>
</body>
</html>
@endsection