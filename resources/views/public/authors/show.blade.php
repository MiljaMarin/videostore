@extends('layouts.default')
@section('title','Todo')
@section('header','Todo')

@section('content')
    <div>
        <h5>
            {{ $data->id}} {{ $data->firstname}} {{ $data->lastname}}
        </h5>

    </div>
@endsection
