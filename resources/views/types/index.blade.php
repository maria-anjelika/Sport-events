
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
<div class="panel-heading">
    <a class="btn btn-small btn-info" href="{{ URL::to('types/create') }}">Create a Type</a>
</div>
<br>
<form action="{{action("SearchController@searchTypes")}}" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="search"
               placeholder="Search a type"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search">Search</span>
            </button>
        </span>
    </div>
</form>
<br>
<td>
    @if (Auth::check())
        <a class="btn btn-small btn-info" href="{{ URL::to('images') }}"> <span>Images</span></a>
    @endif
</td>
<table class="table-bordered">
    <thead class="thead-dark">
    <tr>
        <th>ID</th>
        <th>Type</th>
    </tr>
    </thead>
    <tbody>
    @foreach($types as $key => $value)
        <tr>
            <td>{{$value->id}}</td>
            <td>{{$value->type}}</td>
            <td>
                <a class="btn btn-primary btn-red" href="{{ route('types.show', $value->id) }}" method="POST">Show</a>
            </td>
            <td>
                <a class="btn btn-small btn-info" href="{{ URL::to('types/' . $value->id . '/edit') }}">Edit</a>
            </td>
            <td>
                <form action="{{action('TypeController@destroy', $value->id )}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>

        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
@endsection