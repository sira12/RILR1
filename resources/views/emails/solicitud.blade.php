<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
</head>
<body>

    @if($obj->status == 1)


    <h3>Tu Solicitud en el Sistema de Registro de Establecimiento industrial ha sido Aprobada. </h3>
    
    <span>Podes iniciar Sesion </span><a href="https://registroindustrial.larioja.gob.ar"> Aqui</a>  
    @else

    <h3>TU SOLICITUD HA SIDO RECHAZADA, POR FAVOR COMUNICATE CON INDUSTRIA O DIRÍGETE A NUESTRAS INSTALACIONES PARA MAYOR INFORMACIÓN.</h3>

    @endif

</body>
</html>