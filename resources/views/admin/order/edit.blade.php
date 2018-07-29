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
            <small class="pull-right">Kode Pemesanan : {{$pembeli->formid}}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <h3>
          Pembeli
          </h3>
          <address>
            <strong>{{$pembeli->nama}}</strong><br>
            {{$pembeli->alamat}}<br>
            {{$pembeli->telp}}</br>
            <p>{{$pembeli->prov}}, {{$pembeli->kd_pos}}</p>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <h3>
            Tanggal Order
          </h3>
          <address>
          <strong>{{$pembeli->created_at}}</strong>
          </address>
          <h3>
            Note
            </h3>
            <address>
            <strong>{{$pembeli->note}}</strong>
            </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <form role="form" method="POST" action="{{ route('order.update', $pembeli) }}">
                {{csrf_field()}} 
                {{method_field('PATCH')}}
                <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control" name="status">
                        <option value="{{ $pembeli->status }}" hidden>{{ $pembeli->status }}</option>
                        <option value="Unpaid">Unpaid</option>
                        <option value="Paid">Paid</option>
                        <option value="Shipped">Shipped</option>
                    </select>
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </form>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Qty</th>
              <th>Produk</th>
              <th>Id Produk</th>
              <th>Harga</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
              @foreach($transaksi as $t)
            <tr>
            <td>{{$t->qty}}</td>
            <td>{{$t->product->name}}</td>
            <td>{{$t->id_product}}</td>
            <td>{{$t->product->harga}}</td>
            <td>{{$t->subtotal}}</td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
            <p class="lead">Bukti Transfer :</p>
            <img class="img-responsive" 
                src="{{ asset('uploads/bukti_trans/'.$pembeli->bukti) }}" alt="" width="500" height="500">
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Jumlah</p>

          <div class="table-responsive">
              <table class="table">
                  <tr>
                    <th style="width:50%">Jumlah produk:</th>
                    <td>{{$pembeli->jml_brg}}</td></tr>
                    <tr>
                    <th style="width:50%">Total:</th>
                    <td>{{$pembeli->total}}</td>
                  </tr>
                </table>
          </div>
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