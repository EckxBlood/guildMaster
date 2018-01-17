@extends('layouts.app')

@section('content')
    <div class="container">

    @if (!is_null($data))
        @foreach($data as $membre)
                <div class="membre">
                    <div class="quete">
                        <div class="content">
                            <h3> {{ $membre->name }}</h3>
                            <p> {{ $membre->description }}</p>
                            <p> {{ $membre->attaque }}</p>
                            <p> {{ $membre->defense }}</p>
                            <p> {{ $membre->niveau }}</p>
                        </div>
                    </div>
                </div>
        @endforeach
    @endif
    @if ($data2 >= 20)
        <a type="button" style="font-size: 18px; width:300px; margin-left: 50px; padding: 15px; text-decoration: none;"
           href="{{ route('membres.add', ['idMembre' => 1]) }}">  Ajouter un membre  </a>
    @endif
    </div>
@endsection