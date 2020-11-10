@extends('layouts.default')
@section('title','Authors')
@section('header','Authors')

@section('content')
    <div>

    {{--dd($data) --> gibt den kompletten Inhalt von $data aus--}}
    {{--count($data) //zählt wieviele Elemente in $data sind ($data ist ein Array)--}}
    <!--todos tabelle darstellen-->
        <!-- if-abfrage-->
        <!-- wenn ja, dann tabelle darstellen-->
        <!-- wenn nein, dann ausgeben: keine daten vorhanden-->


    @if(count($data) > 0)
        <!--wenn ja, dann Tabelle darstellen-->
            <table class="table table-striped">
                <tr>
                    <th>id</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                </tr>


            @foreach($data as $item)
                <!--<p>This is todo {{--$item->text--}}</p>-->
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->firstname }}</td>
                        <td><a class="link" href="{{ route('authors.show', ['id' => $item->id]) }}">{{ $item->lastname}}</a></td>
                    </tr>
                @endforeach
            </table>
    @else
        <!--wenn nicht, dann ausgeben: Keine Daten vorhande -->
            <h3>Keine Daten vorhanden</h3>
        @endif
    </div>
@endsection

