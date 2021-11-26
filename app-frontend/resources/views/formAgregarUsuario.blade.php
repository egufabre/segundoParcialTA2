<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Agregar Cliente</h1>

    @isset($exito)
        <div style="color: #000000">Error al intentar registrar el Cliente</div>
    @endisset

    <form action="/registro" method="post">
        @csrf
        Nombre de Usuario: <input type="text" name="nombreUsuario"><br />
        Correo: <input type="email" name="correo"><br />
        Password: <input type="password" name="password"><br />
        Nombre: <input type="text" name="nombre"><br />
        Apellido: <input type="text" name="apellido"><br />
        Telefono: <input type="text" name="telefono"><br />
        <input type="submit" value="Enviar">
    </form>
    </body>
</html>
