<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulário Pessoa</title>
</head>
<body>

    <div>
        @if(Session::has('success'))
            <p>{{Session::get('success')}}</p>
        @endif

        @if(Session::has('error'))
            <p>{{Session::get('error')}}</p>
        @endif
    </div>

    <form action = "{{(!isset($pessoa)) ? route('form') : url('pessoa/'. $pessoa->id) }}" method="POST">
    
    @if(isset($pessoa))
        @method('PUT')
    @endif
    @csrf

        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" value="{{(isset($pessoa)) ? $pessoa->nome : ''}}"> <br><br>
        {{$errors->first('nome')}}

        <input type="submit" value="Enviar">
    
    </form>

    <a href='pessoa'><button>Listar</button></a>
    
    
</body>
</html>