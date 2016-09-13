<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<div class="panel panel-default">
    <div class="panel-heading"><strong>Nombre:</strong> {!! Auth::user()->nombre!!}</div>
    <div class="panel-body">
        Cantidad:
        </strong>
        {!! $cantidad !!}

        <br/>
        <strong>
            Correo:
        </strong>
        {!!Auth::user()->email!!}
        <br/>
        <strong>
            Nombre:
        </strong>
        {!!Auth::user()->nombre !!}
        {!!Auth::user()->apellido !!}
        <br/>
        Paypal Email:
        </strong>
        {!!Auth::user()->paypal_email !!}
        {!!Auth::user()->paypal_name !!}
        <br/>
        <strong>
            Email que puso para solicitar pago:
        </strong>
        {!! $email !!}
    </div>
</div>

</body>
</html>