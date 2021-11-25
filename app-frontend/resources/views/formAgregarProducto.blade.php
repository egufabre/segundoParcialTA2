<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
</head>
<body>
    <h1>Producto</h1>  

    @isset($exito)
        <div style="color: #000000">Producto Agregado correctamente</div>
    @endisset
    @isset($exitoModificar)
    <div style="color: #000000">Producto modificado correctamente</div>
    @endisset

    @isset($productos)

    <form action="/agregarProductos" method="post">
        @csrf
        Nombre: <input type="text" name="nombre"><br />
        Descripcion: <input type="text" name="descripcion"><br />
        Stock: <input type="text" name="stock"><br />
        
        @else
        <form action="/modificarProductos" method="post">
            ID: <input type="text" name="id"><br />
            Nombre: <input type="text" name="nombre"><br />
            Descripcion: <input type="text" name="descripcion"><br />
            Stock: <input type="text" name="stock"><br />
            @endif
            @csrf
            <input type="submit" value="Enviar">
    </form>
</body>
</html>