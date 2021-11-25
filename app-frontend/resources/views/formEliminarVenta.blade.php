<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
</head>
<body>
    <h1>Eliminar Venta</h1>

    @isset($exito)
        <div style="color: #000000">Venta Eliminado correctamente</div>
    @endisset
    <form action="/eliminarVenta" method="post">
        @csrf
        ID: <input type="text" name="id"><br />
        <input type="submit" value="Enviar">
    </form>
</body>
</html>