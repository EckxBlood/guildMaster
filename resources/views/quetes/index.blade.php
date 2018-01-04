@extends('layouts.app')

@section('content')
    <div class="container">

    @foreach($data as $quete)
            <div class="quete">
                <h3 class="col-4"> {{ $quete->name }}</h3>
                <p class="col-6">{{ $quete->description }}</p>
                <a class="col-6" type="button" href="{{ route('quetes.start', ['idQuest' => $quete->id, 'idMembre' => 1]) }}">Commencer la quête</a>
            </div>
    @endforeach
    </div>
@endsection