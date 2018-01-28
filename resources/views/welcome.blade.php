@extends('layouts.app')

@section('content')
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <style>
        .content {
            position: absolute;
            width: 300px;
            height: 84px;
            top: calc(50% - 42px);
            left: calc(50% - 150px);
        }

        .title {
            font-size: 84px;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
        }

    </style>


    <div class="content">
        <div class="title">
            Laravel
        </div>
    </div>
@endsection()