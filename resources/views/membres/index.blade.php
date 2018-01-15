@extends('layouts.app')

@section('content')
    @foreach($data as $membre)
            <div class="membre">
                <div class="quete">
                    <div class="content">
                        <h3> {{ $membre->name }}</h3>
                        <h3> {{ $membre->description }}</h3>
                        <h3> {{ $membre->attaque }}</h3>
                        <h3> {{ $membre->defense }}</h3>
                        <h3> {{ $membre->niveau }}</h3>
                    </div>
                </div>
            </div>
    @endforeach
    @if ($data2 >= 20)
        <a type="button" style="font-size: 18px; width:300px; margin-left: 50px; padding: 15px; text-decoration: none;"
           href="{{ route('membres.add') }}">  Ajouter un membre  </a>
    @endif
@endsection