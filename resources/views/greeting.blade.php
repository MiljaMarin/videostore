@extends('layouts.default')

@section('title', 'Guten Tag')

@section('header', 'Guten Tag ' . $name)

@section('content')
    <p>Mein Name ist {{ $name }}</p>
@endsection


