@extends('layouts.app')

@section('content')
    @foreach($data as $membre)
        <div class="container">
            {{ $membre->name }}
        </div>
    @endforeach
@endsection