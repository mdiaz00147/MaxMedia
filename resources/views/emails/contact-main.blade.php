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
        {!!$email!!}
        <br/>
        <strong>
          Pais:
        </strong>
        {!! $pais !!}
        <br>
        <strong>
            Paypal or email for payment:
        </strong>
        {!! $paypal !!}
        <br>
        <strong>
            Skype:
        </strong>
        {!! $skype !!}
        <br>
        <strong>
            Web:
        </strong>
        {!! $web_site !!}
        @if(isset($code_referrer))
              <br>
            <strong>
                Codigo referido:
            </strong>
            {!! $code_referrer !!}
              <br>
            <strong>
                Usuario referrer        :
            </strong>
            {!! $user_referrer !!} -- {!! $user_email_referrer !!}
        @endif
    </div>
</div>

</body>
</html>