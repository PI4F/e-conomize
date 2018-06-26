<html>
<head>

</head>
<body>
<p> {{ $pessoas }} </p>
@foreach($pessoas as $pessoa)
        Nome: {{ $pessoa->nome }} <br>
        Telefone:
        @foreach($pessoa->telefone as $telefone)
                {{ $telefone->telefone }}
        @endforeach
@endforeach
</body>
</html>