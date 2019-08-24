<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ducumentos</title>
</head>

<body>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Numero</th>
            <th>Titular</th>
            <th colspan="2"> Ações</th>
            @foreach($documentos as $documento)
        </tr>
            <td>{{$documento->id}}</td>
            <td>{{$documento->nome}}</td>
            <td>{{$documento->numero}}</td>
            <td>{{$documento->pessoa->nome}}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>