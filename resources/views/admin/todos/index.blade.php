@extends('layouts.default')
@section('title','Todos')
@section('header','Todos')

@section('content')
    <div class="m-0">
        <a role="button" class="btn btn-primary" href="{{ route('todos.create') }}"><i class="fas fa-plus-square"></i>Create new Todo</a>
    </div>
    <div class="mt-3">

        @if(count($todos) > 0)
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Text</th>
                <th>done</th>
                <!-- mit colspan"2" wird über zwei Zeilen gesprungen -->
                <th colspan="2"></th>
            </tr>
        @foreach($todos as $todo)
            <!--<p>This is todo {{--$todo->text--}}</p>-->
                <tr>
                    <td>{{ $todo->id }}</td>
                    <td><a class="link" href="{{ route('todos.show', ['id' => $todo->id]) }}">{{ $todo->text}}</a></td>
                    <td>{{$todo->erledigt }}</td>
                    <td><a role="button" class="btn-sm btn-primary"
                           href="{{route('todos.edit', ['id' => $todo->id])}}"><i class="fas fa-edit"></i>Edit</a></td>
                    <td><a role="button" class="btn-sm btn-danger"
                           onclick="return confirm('Datensatz wirklich löschen?')"
                           href="{{route('todos.destroy', ['id' => $todo->id])}}"><i class="fas fa-trash-alt"></i>Delete</a></td>
                </tr>
        @endforeach
        </table>
        @endif
    </div>
@endsection

