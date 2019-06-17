@extends('layout')
@section('contenido')
    @if(!empty($clientesPerdidos)&&!empty($clientesHospedadosPorServicio))
    <div class="container-fluid">
        <h1>Reportes de perdidas</h1>
        <div class="col">
            <a class="btn btn-outline-info" href="{{route('reportesPerdidasPdf')}}">Guardar como PDF</a>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <table class="table table-hover table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">N°</th>
                            <th scope="col">Tipo Cliente</th>
                            <th scope="col">Importe perdido</th>
                            <th scope="col">Total perdida acumulada</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clientesPerdidos as $clientesPerdido)
                        <tr>
                            @if ($clientesPerdido->perdida != 0)
                            <th scope="row">{{$clientesPerdido->numero_cliente}}</th>
                            <td>{{$clientesPerdido->tipo_cliente}}</td>
                            <td>{{$clientesPerdido->perdida}}</td>
                            <td>{{$clientesPerdido->total_perdida}}</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col">
                        <a class="btn btn-info mb-3" href="{{route('datosSimulacion')}}">Tabla Simulacion</a>
                </div>
            </div>
            <script type="text/javascript" src={{asset("js/loader.js")}}></script>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);
                
                function drawChart() {
                    
                    var data = google.visualization.arrayToDataTable([
                    ['Tipo clientes', 'Numero'],
                    ['Habitacion economica ', {{$clientesHospedadosPorServicio[0]}}],
                    ['Habitacion de negocios', {{$clientesHospedadosPorServicio[1]}}],
                    ['Habitacion ejecutiva', {{$clientesHospedadosPorServicio[2]}}],
                    ['Habitacion premium', {{$clientesHospedadosPorServicio[3]}}],
                    ['Clientes que no se hospedaron', {{$clientesHospedadosPorServicio[4]}}],
                    ]);
        
                    var options = {
                    title: 'Porcentajes clientes hospedados por tipo de habitacion y no hospedados',
                    is3D: true,
                    };
        
                    var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
        
                    chart.draw(data, options);
                }
            </script>
            <script type="text/javascript">

                google.charts.load("current", {packages:['corechart']});
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    //var color = ["red", "gold", "green", "blue"];
                    var data = google.visualization.arrayToDataTable([
                        ["Estados", "Cantidad", { role: "style" } ],
                        ['Ganancias por habitacion economica',  {{$gananciasYPerdidas[0]}}, 'green'],
                        ['Ganancias por habitacion de negocios',  {{$gananciasYPerdidas[1]}}, 'blue'],
                        ['Ganancias por habitacion ejecutiva',  {{$gananciasYPerdidas[2]}}, 'orange'],
                        ['Ganancias por habitacion Premium',  {{$gananciasYPerdidas[3]}}, 'purple'],
                        ['Total ganacias',  {{$gananciasYPerdidas[4]}}, 'gold'],
                        ['Total perdidas',  {{$gananciasYPerdidas[5]}}, 'red'],
                    ]);

                    var view = new google.visualization.DataView(data);
                    view.setColumns([0, 1,
                                    { calc: "stringify",
                                        sourceColumn: 1,
                                        type: "string",
                                        role: "annotation" },
                                    2]);

                    var options = {
                        title: "Comparación ganancias por tipo de habitacion y perdidas",
                        bar: {groupWidth: "95%"},
                        legend: { position: "none" },
                        is3D: true,
                    };

                    var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values1"));
                    chart.draw(view, options);
                }
            </script>
            <div class="col-sm-8">
                <div id="piechart1" style="width: 900px; height: 500px;"></div>
                <div id="columnchart_values1" style="width: 1000px; height: 700px;"></div>
            </div>
        </div>
    </div>
    
    @else
    <li>No inicio una simulacion</li>
    @endif
@endsection