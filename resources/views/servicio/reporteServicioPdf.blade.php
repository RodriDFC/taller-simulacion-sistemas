<!doctype html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Reporte Servicios</title>
    <!-- Bootstrap core CSS -->
    <link href={{asset('css/bootstrap.min.css')}} rel="stylesheet">
</head>
<body>
<div class="row">
    <div class="col-11">
        <h3>Reporte Servicios</h3>
    </div>
</div>
<table class="table table-hover table-bordered text-center">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Servicio</th>
        <th scope="col">Cantidad de veces pedido</th>
        <th scope="col">Precio Unitario</th>
        <th scope="col">Ganancia Hotel por el servicio</th>
    </tr>
    </thead>
    <tbody>
    @foreach($servicios as $servicio)
        <tr>
            <td>{{$servicio[0]}}</td>
            <td>{{$servicio[1]}}</td>
            <td>{{$servicio[2]}}</td>
            <td>{{$servicio[3]}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>