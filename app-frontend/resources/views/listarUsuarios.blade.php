<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Usuarios</h1>


    @foreach($Usuarios as $u)
        ID: {{ $u["id"] }} <br />
        Nombre: {{ $u["nombre"] }} <br />
        Apellido: {{ $u["apellido"] }} <br />
        Telefono: {{ $u["telefono"] }} <br />
        Correo: {{ $u["correo"] }} <br />
        <br />
    @endforeach
</body>
</html>
