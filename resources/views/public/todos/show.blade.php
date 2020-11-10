@extends('layouts.default')
@section('title','Todo')
@section('header','Todo')

@section('content')
    <div>
        <h5>
            {{ $todo->text }}
        </h5>
        <p>Ist erledigt</p> <br><b>{{$todo->erledigt }}</b>

    </div>
@endsection
