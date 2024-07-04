@extends('layouts.app')

@section('title', "BoolLine")
@section('css')
    <link rel="stylesheet" href="{{ asset('resources/scss/app.css') }}">
@endsection

@section('content')
    <h1>TRAINS LIST</h1>

    @foreach ($trains as $train)
    <div class="card">
        <p>Azienda: {{$train->azienda}}</p>
        <p>Stazione di partenza: {{$train->stazione_di_partenza}}</p>
        <p>Stazione di arrivo: {{$train->stazione_di_arrivo}}</p>
        <p>Orario di Partenza: {{$train->orario_di_partenza}}</p>
        <p>Orario di Arrivo: {{$train->orario_di_arrivo}}</p>
        <p>Codice Treno: {{$train->codice_treno}}</p>
        <p>Numero Carrozze: {{$train->numero_Carrozze}}</p>
        <p>In orario? {{$train->in_Orario}}</p>
        <p>Cancellato? {{$train->cancellato}}</p>
        <p>Treno Veloce?{{$train->treno_veloce}}</p>
    </div>
    @endforeach
@endsection
