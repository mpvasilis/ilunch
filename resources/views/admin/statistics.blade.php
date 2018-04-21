@extends('admin.layouts.template')
@section('title')
    Statistics
@endsection

@section('main')
<div class="box">

<div class="row">
    <div class="col-md-12">
        <div class="box-header with-border">
            <h3 class="box-title">Ιστορικό Γευμάτων</h3>
            <div class="box-body">
                <table class="table table-bordered table-hover dataTable" id="table">
                                    <thead>
                                    <tr role="row">
                                        <th>ID</th>
                                        <th>Όνομα</th>
                                        <th>Ημερομηνία - Ώρα</th>
                                        <th>Τύπος Γεύματος</th>
                                        
                                    </tr>
                                        
                                    </thead>
                                    
                                    <tbody>
                                    
                                    @foreach ($historys as $history)
                                    <tr role="row" class="odd">
                                        <td>{{ $history['id'] }}</td>
                                        <td>{{ $history['name']}}</td>
                                        <td>{{ $history['date']}}</td>
                                        <td>{{ $history['meal_type']}}</td>
                                    
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                
                                    </tfoot>
                </table>

                        
            </div>
        </div> 
    </div>
</div> 
</div>

<div class="row" style="margin-top:2%;">
    <div class="col-md-6">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Συνολικά Γεύματα Τελευταίας Εβδομάδας</h3>
                <div class="box-body">
                <div class="chart">
                    <canvas id="lineChart" style="height: 250px; width: 610px;" width="794" height="325"></canvas>
                </div>
                </div>
            </div>
        </div> 
    </div>
    <div class="col-md-6">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Γεύματα/Τύπο Τελευταίας Εβδομάδας</h3>
                <div class="box-body">
                <canvas id="barChart" style="height: 251px; width: 611px;" width="795" height="326"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>  

</div>  
@endsection
@section('scripts')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script>

     $(function () {
    $('#table').DataTable({
    "searching": false})
  })
  $(function () {


    var areaChartData = {
      labels  : [
            @foreach ($range as $day)
                "{{$day}}",
            @endforeach  
      ],
      datasets: [
        {
          label               : 'Συνολικά γεύματα',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [ 
            @foreach ($CountsPerDay as $count)
                "{{$count}}",
            @endforeach  ]
        },
        
      ]
    }

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : false,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : false,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }


    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
    var lineChart                = new Chart(lineChartCanvas)
    var lineChartOptions         = areaChartOptions
    lineChartOptions.datasetFill = false
    lineChart.Line(areaChartData, lineChartOptions)
    
    var areaChartData1 = {
        labels  : [
            @foreach ($range as $day)
                "{{$day}}",
            @endforeach  
      ],
      datasets: [
        {
          label               : 'Πρωινό',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [ 
            @foreach ($Type as $t)
                "{{$t['breakfast']}}",
            @endforeach  ]
        },
        
        {
          label               : 'Μεσημεριανό',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [ 
            @foreach ($Type as $t)
                "{{$t['lunch']}}",
            @endforeach  ]
        },
        {
          label               : 'Βραδυνό',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [ 
            @foreach ($Type as $t)
                "{{$t['dinner']}}",
            @endforeach  ]
        }
      ]
    }
    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData1
    barChartData.datasets[1].fillColor   = '#00a65a'
    barChartData.datasets[1].strokeColor = '#00a65a'
    barChartData.datasets[1].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
  
    
  })
  
 
</script>
@endsection
