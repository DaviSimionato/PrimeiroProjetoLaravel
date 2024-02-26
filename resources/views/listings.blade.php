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
    <main style="max-width: 500px; margin-top: 30px; margin-left: 60px">
        @if (empty($dataArray))
            <p>Nada aqui 😓</p>
            @dd($dataArray);
        @else
            @foreach ($dataArray as $item)
                <h2><a href="/listings/{{$item["id"]}}">{{$item["title"]}}</a></h2>
                <p>Id: {{ $item["id"] }}</p>
                <p style="max-width: 600px">{{ $item["description"] }}</p>
                <br><br>
            @endforeach
        @endif
    </main>
</body>
</html>

