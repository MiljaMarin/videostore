@extends('layouts.default')
@section('title','Authors')
@section('header','Authors')

@section('content')
    <div class="m-0">
        <a role="button" class="btn btn-primary" href="{{ route('authors.create') }}"><i class="fas fa-plus-square"></i>Create new Author</a>
    </div>
    <div class="mt-3">

        @if(count($data) > 0)
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th colspan="2"></th>
            </tr>
        @foreach($data as $item)
            <!--<p>This is todo {{--$item->text--}}</p>-->
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->firstname }}</td>
                    <td><a class="link" href="{{ route('authors.show', ['id' => $item->id]) }}">{{ $item->lastname}}</a></td>
                    <td><a role="button" class="btn-sm btn-primary" href="{{route('authors.edit', ['id' => $item->id])}}"><i class="fas fa-edit"></i>Edit</a></td>
                    <td><a role="button" class="btn-sm btn-danger"
                           onclick="return confirm('Datensatz wirklich löschen?')"
                           href="{{route('authors.destroy', ['id' => $item->id])}}"><i class="fas fa-trash-alt"></i>Delete</a></td>
                </tr>
            @endforeach
        </table>
        @else
        <!--wenn nicht, dann ausgeben: Keine Daten vorhande -->
            <h3>Keine Daten vorhanden</h3>
        @endif
    </div>
@endsection

