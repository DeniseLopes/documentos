<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Pessoas</title>
</head>

<body>
    <!--Todos as pessoas -->

    <a href="{{url('/pessoa/create')}}"><button>Criar</button></a>

    <h1>Pessoas Ativas</h1>
    
    <div>
        @if(Session::has('success'))
        <p>{{Session::get('success')}}</p>
        @endif

        @if(Session::has('error'))
        <p>{{Session::get('error')}}</p>
        @endif
    </div>
    <table border=1 width=20%>
        <tr>
            <th>Nome</th>
            <th colspan="2">Funções</th>
        </tr>
        @foreach($pessoas as $pessoa)
        <tr>
            <td>{{$pessoa->nome}}</td>
            <td><a href="{{url('pessoa/'.$pessoa->id.'/edit')}}"><button>Editar</button></a></td>
            <td>
                <form method="POST" action="{{url('pessoa/' .$pessoa->id)}}">
                    @method('delete')
                    @csrf
                    <button type="submit">Deletar</button>

                </form>
                @endforeach
            </td>
        </tr>
    </table>
    <br>

    <!--Pessoas Inativas -->



    <h1>Pessoas Itivas</h1>
    

    <table border=1 width=20%>
        <tr>
            <th>Nome</th>
            <th colspan="2">Funções</th>
        </tr>
        @foreach($pessoasInativas as $pessoa)
        <tr>
            <td>{{$pessoa->nome}}</td>
           
            <td>
                <form method="POST" action="{{url('pessoa/restore/' .$pessoa->id)}}">
                    @method('put')
                    @csrf
                    <button type="submit">Restaurar</button>
                </form>
            </td>         
        </tr>
        @endforeach
    </table>
</body>

</html>