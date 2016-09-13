<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<div class="panel panel-default">
    <div class="panel-heading"><strong>Nombre:</strong> {!!$name!!}</div>
    <div class="panel-body">
        <strong>
            Correo:
        </strong>
        {!!Auth::user()->email!!}
        <br/>
        <strong>
            Mensaje:
        </strong>
        {!!$mensaje!!}
    </div>
</div>

</body>
</html>