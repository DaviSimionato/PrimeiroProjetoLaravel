@extends('layout')


@section('content')
    @include('partials._hero')
    @include('partials._search')
    <div class="container mx-auto lg:grid lg:grid-cols-2 lg:gap-4">
    @if (empty($dataArray))
        <p>Nada aqui 😓</p>
    @else
        @foreach ($dataArray as $listing)
            <x-listing-card :listing="$listing"></x-listing-card>
        @endforeach
    @endif
    </div>
@endsection
