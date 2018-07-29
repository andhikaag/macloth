@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>{{$new_order}}</h3>

            <p>New Orders</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
         <a href="{{route('order.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>{{$productcount}}</h3>

            <p>Total Product</p>
          </div>
          <div class="icon">
            <i class="fa fa-tags"></i>
          </div>
         <a href="{{route('product.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
           <h3>{{$sukses_order}}</h3>

            <p>Success Order</p>
          </div>
          <div class="icon">
            <i class="fa fa-truck"></i>
          </div>
          <a href="{{route('reports.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
        <a class="btn btn-success" href="{{ route('home') }}">
            Day
        </a>
        <a class="btn btn-primary" href="{{ route('home.month') }}">
              Month
        </a>
        <a class="btn btn-danger" href="{{ route('home.year') }}">
            Year
        </a>
      <!-- Left col -->
         <div id="linechart" style="width: 100%; height: 500px"></div>
    </div>
    <!-- /.row (main row) -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">

      var pembeli = <?php echo $pembeli; ?>;

      console.log(pembeli);

      google.charts.load('current', {'packages':['corechart']});

      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable(pembeli);

        var options = {

          title: 'Produk yang Terjual',

          curveType: 'function',

          legend: { position: 'bottom' },
          lineWidth: 5,
          pointSize: 10,
        };

        var chart = new google.visualization.LineChart(document.getElementById('linechart'));

        chart.draw(data, options);

      }

  </script>

