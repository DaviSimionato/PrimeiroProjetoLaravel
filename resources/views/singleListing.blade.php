<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $dataArray["nome"] }}</title>
</head>
<body>
    <a href="/">Voltar</a>
    <h2>{{$dataArray["nome"]}}</h2>
    <p>Id: {{ $dataArray["id"] }}</p>
    <p>Nome: {{ $dataArray["nome"] }}</p>
    <p>Idade: {{ $dataArray["idade"] }}</p>
</body>
</html>