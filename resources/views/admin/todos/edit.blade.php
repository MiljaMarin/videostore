@extends('layouts.default')
@section('title','Edit Todos')
@section('header','Edit Todos')

@section('content')
    <form method="post" action="{{route('todos.update',['id' => $todo->id])}}">
    @csrf
        <div class="form-group row">
            <label for="text" class="col-md-2 col-form-label">Text</label>
            <div class="col-md-10">
                <input
                    type="text"
                    id="text"
                    name="text"
                    value="{{$todo->text}}"
                    class="@error('text') is-invalid @enderror form-control px-1"
                />

                @error('text')
                <span class="d-block invalid-feedback" role="alert">
                    <strong>{{ $errors->first('text') }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="done" class="col-md-2 col-form-label">Erledigt: </label>
            <div class="col-md-1">
                <input
                    type="checkbox"
                    id="done"
                    name="done"
                    value="1"
                    class="form-control-sm px-1"
                    @if(!!$todo->done) checked @endif
                />
                <!-- wandelt in boolschen Wert um-->
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
