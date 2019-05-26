@extends('layout')
@section('contenido')
 <h1>Tabla de la simulacion</h1>
  @if(!empty($servicios) && !empty($tipoHabitaciones))
  <html>
        <head>
            <script type="text/javascript" src={{asset("js/loader.js")}}></script>
            <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
    
            function drawChart() {
    
                var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                
                @foreach($servicios as $servicio)
                    ['{{$servicio[0]}}',     {{$servicio[1]}}],    
                @endforeach
                ]);
    
                var options = {
                title: 'Porcentajes de servicios solicitados del hotel',
                is3D: true,
                };
    
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    
                chart.draw(data, options);
            }
            </script>
            <script type="text/javascript">

                google.charts.load("current", {packages:['corechart']});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                    var color = ["red", "gold", "green", "blue"];
                    var data = google.visualization.arrayToDataTable([
                        ["Element", "Density", { role: "style" } ],
                        @foreach($tipoHabitaciones as $tipoHabitacion)
                            ['{{$tipoHabitacion[0]}}',  {{$tipoHabitacion[1]}}, '{{$tipoHabitacion[2]}}'],    
                        @endforeach
                    ]);

                    var view = new google.visualization.DataView(data);
                    view.setColumns([0, 1,
                                    { calc: "stringify",
                                        sourceColumn: 1,
                                        type: "string",
                                        role: "annotation" },
                                    2]);

                    var options = {
                        title: "Demanda por tipo de habitación",
                        bar: {groupWidth: "95%"},
                        legend: { position: "none" },
                        is3D: true,
                    };

                    var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
                    chart.draw(view, options);
                }
            </script>
        </head>
        <body>
            <div id="piechart" style="width: 1000px; height: 700px;"></div>
            <div id="columnchart_values" style="width: 1000px; height: 600px;"></div>
        </body>
    </html>
  @else
   <li>No hay usuarios</li>
  @endif

@endsection