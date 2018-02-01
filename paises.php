<!DOCTYPE html>
<html>
  <head>
     <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <meta charset="utf-8">
    <title>Paises ordenados por su continente</title>
  </head>
  <body>
    <h2>Paises ordenados por su superficie:</h2>

    <div id="myfirstchart" style="height: 250px;"></div>

    <?php
    // conexion a la bbdd
    $mysqli = new mysqli("localhost", "root", "", "world");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: " .
        $mysqli->connect_error;
    }
        echo "Conexion realizada con exito, figura <br><br>";

    // consulta para mostrar todos los paises ordenados por superficie
    $consulta = $mysqli->query("SELECT Name,SurfaceArea FROM country WHERE Continent='Asia' ORDER BY SurfaceArea DESC");

    //Cuantas filas nos devuelve
  	echo "<br>Los paises de forma ordenada son: ".$consulta->num_rows."<br>";
     ?>

     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
     <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
     <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
     <script type="text/javascript">

       new Morris.Line({
   // ID of the element in which to draw the chart.
   element: 'myfirstchart',
   // Chart data records -- each entry in this array corresponds to a point on
   // the chart.
   data: [
     { year: 'Japan', value: 37782900 },
     { year: 'Hong Kong', value: 6782000 },
     { year: 'North Korea', value: 24039000 },
     { year: 'South Korea', value: 46844000 },
     { year: 'Macao', value: 47300 },
     { year: 'China', value: 127755800 },
     { year: 'Syria', value: 185180.00 },
     { year: 'Turkmenistan', value: 488100.00},
   ],
   // paises: [
   //   { name: 'Japan', surfaceArea: 37782900 },
   //   { name: 'Hong Kong', value: 6782000 },
   //   { year: '2009', value: 10 },
   //   { year: '2010', value: 5 },
   //   { year: '2011', value: 5 },
   //   { year: '2012', value: 20 }
   // ],
   // The name of the data record attribute that contains x-values.
   xkey: 'year',
   // A list of names of data record attributes that contain y-values.
   ykeys: ['value'],
   // Labels for the ykeys -- will be displayed when you hover over the
   // chart.
   labels: ['Area'],
   parseTime: false
 });
     </script>
  </body>
</html>
