@extends('layouts.app')

@section('content')
    <div class="container">

        @foreach($data as $quete)
            <div class="quete">
                <div class="content">
                    <h3> {{ $quete->name }}</h3>
                    <p>{{ $quete->description }}</p>
                    <p>{{ $quete->dateDebut }}</p>
                    <p>{{ $quete->dateFin }}</p>
                    <a type="button" href="{{ route('quetes.start', ['idQuest' => $quete->id, 'idMembre' => 1]) }}">Commencer la quête</a>
                    <a type="button" href="{{ route('quetes.complete', ['idQuest' => $quete->id]) }}">Terminer la quête</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection