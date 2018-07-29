@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Order
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('order.index') }}">Order</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-exclamation"></i>Detail
            <small class="pull-right">Product ID : {{$product->id}}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <h3>
          Product
          </h3>
          <address>
            <strong>{{$product->name}}</strong><br>
            {{$product->category}}<br>
            Rp. {{$product->harga}}</br>
            <p>{{$product->status}}</p>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <h3>
            Tanggal Input
          </h3>
          <address>
          <strong>{{$product->created_at}}</strong>
          </address>
          <h3>
            Desc
            </h3>
            <address>
            <strong>{{$product->keterangan}}</strong>
            </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
                <div class="box box-solid">
                <h3>
                 Image
                </h3>
                        <!-- /.box-header -->
                        <div class="box-body">
                          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                              <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                              <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                            </ol>
                            <div class="carousel-inner">
                              <div class="item active">
                                <img src="{{ asset('uploads/product_img/'.$product->img1) }}" alt="First slide">
            
                                <div class="carousel-caption">
                                  First Slide
                                </div>
                              </div>
                              <div class="item">
                                <img src="{{ asset('uploads/product_img/'.$product->img2) }}" alt="Second slide">
            
                                <div class="carousel-caption">
                                  Second Slide
                                </div>
                              </div>
                              <div class="item">
                                <img src="{{ asset('uploads/product_img/'.$product->img3) }}" alt="Third slide">
            
                                <div class="carousel-caption">
                                  Third Slide
                                </div>
                              </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                              <span class="fa fa-angle-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                              <span class="fa fa-angle-right"></span>
                            </a>
                          </div>
                        </div>
                        <!-- /.box-body -->
                      </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
                
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>

@endsection