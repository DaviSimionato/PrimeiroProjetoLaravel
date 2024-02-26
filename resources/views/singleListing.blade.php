@extends('layout')

@section('content')
    <main style="max-width: 500px; margin-top: 30px; margin-left: 60px">
        <a href="/">Voltar</a>
        <h2>{{$dataArray["title"]}}</h2>
        <p>Id: {{ $dataArray["id"] }}</p>
        <p>{{ $dataArray["tags"] }}</p>
        <p>{{ $dataArray["company"] }}</p>
        <p>{{ $dataArray["location"] }}</p>
        <p>{{ $dataArray["email"] }}</p>
        <p>{{ $dataArray["description"] }}</p>
    </main>
@endsection