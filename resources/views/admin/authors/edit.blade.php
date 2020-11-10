@extends('layouts.default')
@section('title','Edit Authors')
@section('header','Edit Authors')

@section('content')
    <form method="post" action="{{route('authors.update',['id' => $data->id])}}">
        @csrf
        <div class="form-group row">
            <label for="firstname" class="col-md-2 col-form-label">Firstname</label>
            <div class="col-md-10">
                <input
                    type="text"
                    id="firstname"
                    name="firstname"
                    value="{{$data->firstname}}"
                    class="@error('firstname') is-invalid @enderror form-control px-1"
                />
                @error('firstname')
                <span class="d-block invalid-feedback" role="alert">
                    <strong>{{ $errors->first('firstname') }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="lastname" class="col-md-2 col-form-label">Lastname</label>
            <div class="col-md-10">
                <input
                    type="text"
                    id="lastname"
                    name="lastname"
                    value="{{$data->lastname}}"
                    class="@error('lastname') is-invalid @enderror form-control px-1"
                />

                @error('lastname')
                <span class="d-block invalid-feedback" role="alert">
                    <strong>{{ $errors->first('lastname') }}</strong>
                </span>
                @enderror
            </div>
        </div>


        <div class="form-group row">
            <div class="col-md-auto float-right">
                <input
                    type="submit"
                    id="submit"
                    name="submit"
                    value="Speichern"
                    role="button"
                    class="btn btn-primary col-md-auto px-5"
                />
            </div>
        </div>
    </form>
@endsection
