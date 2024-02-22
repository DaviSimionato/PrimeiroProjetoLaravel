<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Oi</h1>

    @if (count($dataArray) < 1)
        <p>Nada aqui 😓</p>
    @else
        @foreach ($dataArray as $item)
            <a href="/listings/{{$item["id"]}}">{{$item["nome"]}}</a>
            <p>Id: {{ $item["id"] }}</p>
            <p>Nome: {{ $item["nome"] }}</p>
            <p>Idade: {{ $item["idade"] }}</p>
            <br><br>
        @endforeach
    @endif

</body>
</html>

