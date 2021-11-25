<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @isset($error)
    <div style="color: #000000">
        Datos invalidos.
    </div>
    @endisset
    @isset($autenticado)
    <div style="color: #000000">
        Usted se autentico correctamente.
    </div>
    @endisset

    <form action="/login" method="post">
    @csrf

    Email <input type="text" name="email"> <br>
    Password <input type="password" name="password">
    <br>
    <input type="submit" value="Enviar">
    </form>
</body>
</html>
