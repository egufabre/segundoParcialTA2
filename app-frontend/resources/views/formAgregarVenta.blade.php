<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
</head>
<body>
    <h1>Ventas</h1>  

    @isset($exito)
        <div style="color: #000000">Compra agregada correctamente</div>
    @endisset
    @isset($exitoModificar)
    <div style="color: #000000">Compra modificada correctamente</div>
    @endisset

    @isset($ventas)
    <form action="/modificarVenta" method="post">
        ID: <input type="text" name="id"><br />
        Id_Usuario: <input type="text" name="id_usuario"><br />
        Id_Producto: <input type="text" name="id_producto"><br />
    
        @else
    <form action="/agregarVenta" method="post">
        Id_Usuario: <input type="text" name="id_usuario"><br />
        Id_Producto: <input type="text" name="id_producto"><br />
        @endif
        @csrf
        <input type="submit" value="Enviar">
        

    </form>
</body>
</html>