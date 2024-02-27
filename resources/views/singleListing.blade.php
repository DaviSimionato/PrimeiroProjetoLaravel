@extends('layout')

@section('content')
    <div class=" container border bg-slate-400 border-slate-600">
        <a href="/">Voltar</a>
        <h2>{{$dataArray["title"]}}</h2>
        <p>Id: {{ $dataArray["id"] }}</p>
        <p>{{ $dataArray["tags"] }}</p>
        <p>{{ $dataArray["company"] }}</p>
        <p>{{ $dataArray["location"] }}</p>
        <p>{{ $dataArray["email"] }}</p>
        <p>{{ $dataArray["description"] }}</p>
    </div>
@endsection