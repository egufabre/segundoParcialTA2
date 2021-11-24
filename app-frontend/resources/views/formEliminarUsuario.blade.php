<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Eliminar usuario</h1>

    @isset($exito)
        <div style="color: #00FF00">Usuario Eliminado correctamente</div>
    @endisset
    <form action="/eliminarUsuario" method="post">
        @csrf
        ID: <input type="text" name="id"><br />
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
