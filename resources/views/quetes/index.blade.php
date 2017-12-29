@extends('layouts.app')

@section('content')
    @foreach($data as $quete)
        <div class="container">
           <h3> {{ $quete->name }}</h3>
            <p>{{ $quete->description }}</p>
        </div>
    @endforeach
@endsection