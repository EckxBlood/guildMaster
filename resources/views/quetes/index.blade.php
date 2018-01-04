@extends('layouts.app')

@section('content')
    <div class="container">

        @foreach($data as $quete)
            <div class="quete">
                <h3 class="col-4"> {{ $quete->name }}</h3>
                <p class="col-6">{{ $quete->description }}</p>
                <p class="col-6">{{ $quete->dateDebut }}</p>
                <p class="col-6">{{ $quete->dateFin }}</p>
                <a class="col-6" type="button" href="{{ route('quetes.start', ['idQuest' => $quete->id, 'idMembre' => 1]) }}">Commencer la quête</a>
                <a class="col-6" type="button" href="{{ route('quetes.complete', ['idQuest' => $quete->id]) }}">Terminer la quête</a>
                <div class="content">
                    <h3> {{ $quete->name }}</h3>
                    <p>{{ $quete->description }}</p>
                    <a type="button" href="{{ route('quetes.start', ['idQuest' => $quete->id, 'idMembre' => 1]) }}">Commencer la quête</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection