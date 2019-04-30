<html>
  <head>

       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
       <link rel="stylesheet" href="css/app.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <title>Indicadores de gestión</title>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Casos');
        data.addRows([
          @foreach($grafico1 as $grafico)
          ["{{$grafico->año}}",{{$grafico->casos}}],
          @endforeach
        ]);

        // Set chart options
        var options = {'title':'Cantidad de casos ingresados por año',
                       'width':1400,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">


          // Load the Visualization API and the corechart package.
          google.charts.load('current', {'packages':['corechart']});

          // Set a callback to run when the Google Visualization API is loaded.
          google.charts.setOnLoadCallback(drawChart);

          // Callback that creates and populates a data table,
          // instantiates the pie chart, passes in the data and
          // draws it.
          function drawChart() {

            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Casos');
            data.addRows([
              @foreach($grafico2 as $grafico)
              ["{{$grafico->nombre}}",{{$grafico->casos}}],
              @endforeach
            ]);

            // Set chart options
            var options = {'title':'2019 | Casos ingresados por CAVAJ',
                           'width':1400,
                           'height':300};

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.ColumnChart(document.getElementById('chart2_div'));
            chart.draw(data, options);
          }

    </script>

    <script type="text/javascript">


          // Load the Visualization API and the corechart package.
          google.charts.load('current', {'packages':['corechart']});

          // Set a callback to run when the Google Visualization API is loaded.
          google.charts.setOnLoadCallback(drawChart);

          // Callback that creates and populates a data table,
          // instantiates the pie chart, passes in the data and
          // draws it.
          function drawChart() {

            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Casos');
            data.addRows([
              @foreach($grafico3 as $grafico)
              ["{{$grafico->nombre}}",{{$grafico->casos}}],
              @endforeach
            ]);

            // Set chart options
            var options = {'title':'2019 | Casos ingresados por delito',
                           'width':1400,
                           'height':300};

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.ColumnChart(document.getElementById('chart3_div'));
            chart.draw(data, options);
          }

    </script>

  </head>


  <body>
    @include('navbar')
<br>
<form class="" action="/kpi" method="post">
  {{csrf_field()}}
  <label>Fecha inicio de informe</label>
  <input type="date" name="f_inicio" value="">
  <label>Fecha final de informe</label>
  <input type="date" name="f_final" value="">

  <button type="button" class="btn" name="button">GENERAR INFORME</button>

</form>

<br>


    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>
    <div id="chart2_div"></div>
    <div id="chart3_div"></div>

  </body>
</html>
