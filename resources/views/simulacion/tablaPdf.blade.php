<!doctype html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tabla Simulacion</title>
    <!-- Bootstrap core CSS -->
    <link href={{asset('css/bootstrap.min.css')}} rel="stylesheet">
</head>
<body>
<table class="table table-hover table-bordered text-center">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Tipo Cliente</th>
        <th scope="col">Servicios</th>
        <th scope="col">hospedado</th>
        <th scope="col">Pago</th>
        <th scope="col">Ganancia Hotel</th>
    </tr>
    </thead>
    <tbody>
    @foreach($datos as $dato)
        <tr>
            <th scope="row">{{$dato->numero_cliente}}</th>
            <td>{{$dato->tipo_cliente}}</td>
            <td>{{$dato->servicios}}</td>
            <td>{{$dato->hospedado? 'SI':'NO'}}</td>
            <td>{{$dato->pago}}</td>
            <td>{{$dato->total_ganancia}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>