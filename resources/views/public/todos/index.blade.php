@extends('layouts.default')
@section('title','Todos')
@section('header','Todos')

@section('content')
    <div>

        {{--dd($todos) --> gibt den kompletten Inhalt von $todos aus--}}
        {{--count($todos) //zählt wieviele Elemente in $todos sind ($todos ist ein Array)--}}
        <!--todos tabelle darstellen-->
        <!-- if-abfrage-->
        <!-- wenn ja, dann tabelle darstellen-->
        <!-- wenn nein, dann ausgeben: keine daten vorhanden-->


            @if(count($todos) > 0)
                <!--wenn ja, dann Tabelle darstellen-->
            <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Text</th>
                <th>done</th>
            </tr>


        @foreach($todos as $todo)
            <!--<p>This is todo {{--$todo->text--}}</p>-->
            <tr>
                <td>{{ $todo->id }}</td>
                <td><a class="link" href="{{ route('todos.show', ['id' => $todo->id]) }}">{{ $todo->text}}</a></td>
                <td>{{$todo->erledigt }}</td>
            </tr>
          @endforeach
            </table>
            @else
                <!--wenn nicht, dann ausgeben: Keine Daten vorhande -->
                    <h3>Keine Daten vorhanden</h3>
            @endif
    </div>
@endsection

