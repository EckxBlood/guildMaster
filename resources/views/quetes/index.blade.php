@extends('layouts.app')

@section('content')

        <select id="selectMembre" name="membres" title="Choisir membre">
            <option selected="selected"> Choisissez un membre</option>
            @foreach($data2 as $membre)
                <option data-membre="{{$membre->id}}">{{$membre->name}}</option>
            @endforeach
        </select>

        <button id="reload">Recharger</button>

        @foreach($data as $quete)
            @if (isset($quete->membre_id))
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
                                                    <span style="color :red" id="fail{{ $quete->id }}" hidden="hidden">Quete échouée !</span>
                                                    <div class="content">
                                                        <h3> {{ $quete->name }}</h3>
                                                        <p>{{ $quete->description }}</p>
                                                        <p>{{ $quete->recompense }}</p>
                                                        <p>{{ $quete->dateFin }}</p>
                                                        @if ( !$quete->dateFin )
                                                            <select id="membresQuetes{{ $quete->id }}"
                                                                    title="Choisir membre" style="margin:auto;">
                                                                <option selected="selected"> Choisissez un membre
                                                                </option>
                                                                @foreach($data3 as $membre)
                                                                    <option data-membre="{{$membre->id}}">{{$membre->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <button id="startQuest{{ $quete->id }}">Commencer la
                                                                quete
                                                            </button>
                                                        @endif
                                                        @if ( isset($quete->dateFin) && $quete->dateFin < date('Y-m-d H:i:s', strtotime('now +1 Hour')) && isset($quete->membre_id))
                                                            <button id="questComplete" data-membre="{{$quete->membre_id}}" data-quete="{{ $quete->id }}">
                                                                Terminer la quête
                                                            </button>
                                                        @endif
                                                    </div>
                                                </div>

                                                @endforeach
                                        </div>
                            </div>
                    </div>
@endsection