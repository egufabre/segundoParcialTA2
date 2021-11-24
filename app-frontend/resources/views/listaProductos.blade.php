<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Productos</h1>
 
    @foreach($producto as $p)
        ID: {{ $p["id"] }} <br />
        Nombre: {{ $p["nombre"] }} <br />
        Descripcion: {{ $p["descripcion"] }} <br />
        Stock: {{ $p["stock"] }} <br />
        <br />
    @endforeach
</body>
</html>