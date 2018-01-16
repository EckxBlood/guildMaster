@extends('layouts.app')

@section('content')
    <div class="container">

        <select name="membres">
            @foreach($data2 as $membre)
                <option data-membre="{{$membre->id}}">{{$membre->name}}</option>
            @endforeach
        </select>


        @foreach($data as $quete)
            @if ($quete->membre_id != null)
                @if ( $quete->dateFin && $quete->dateFin < date('Y-m-d H:i:s', strtotime('now +1 Hour')))
                    <div class="quete membreId{{$quete->membre_id}}" style="background-color: #48C301; color: white;">
                        @else
                            <div class="quete membreId{{$quete->membre_id}}">
                                @endif
                                @else
                                    @if ( $quete->dateFin && $quete->dateFin < date('Y-m-d H:i:s', strtotime('now +1 Hour')))
                                        <div class="quete" style="background-color: #48C301; color: white;">
                                            @else
                                                <div class="quete">
                                                    @endif
                                                    @endif

                                                    <div class="content">
                                                        <h3> {{ $quete->name }}</h3>
                                                        <p>{{ $quete->description }}</p>
                                                        <p>{{ $quete->dateFin }}</p>
                                                        @if ( !$quete->dateFin )
                                                            <a type="button"
                                                               href="{{ route('quetes.start', ['idQuest' => $quete->id, 'idMembre' => 1]) }}">Commencer
                                                                la quête</a>
                                                        @endif
                                                        @if ( $quete->dateFin && $quete->dateFin < date('Y-m-d H:i:s', strtotime('now +1 Hour')))
                                                            <a type="button"
                                                               href="{{ route('quetes.complete', ['idQuest' => $quete->id, 'idMembre' => $quete->membre_id]) }}">Terminer
                                                                la quête</a>
                                                        @endif
                                                    </div>
                                                </div>

                                                @endforeach
                                        </div>
@endsection