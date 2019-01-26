<!doctype html>
<html>
    <head>
        <title>Produtos</title>
    </head>
    <body>
        <ul>
            @foreach ($produtos as $produto)
                <li>
                    <a href="/produtos/{{$produto->id}}">{{$produto->titulo}}</a>
                </li>
            @endforeach
        </ul>
    </body>
</html>
