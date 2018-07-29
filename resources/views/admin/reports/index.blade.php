@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Order
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Order</li>
      </ol>
    </section>

    <!-- Main content -->
<section class="content">
    <div class="row">
    <div class="col-xs-12">
<div class="box">
    <div class="box-header">
      <h3 class="box-title">Tabel Produk</h3>
    </div>
    <div class="box-header">
      <h3 class="box-title">Set Periode</h3>
    </div>
    <div class="col-sm-4 invoice-col">
    <form role="form" method="POST" action="{{ route('reports.periode') }}">
          {{csrf_field()}} 
          <div class="form-group">
            <label>From (yyyy/mm/dd):</label>

            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" name="from" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
            </div>
            <!-- /.input group -->
          </div>
          <div class="form-group">
            <label>To (yyyy/mm/dd):</label>

            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" name="to" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
            </div>
            <!-- /.input group -->
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Export">
          </div>
      </form>
  </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Provinsi</th>
          <th>Kode Pos</th>
          <th>Nomor Telepon</th>
          <th>Status</th>
          <th>Bukti</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
          @foreach($pembeli as $p)
          <tr>
              <td>{{ $p->nama }}</td>
              <td>{{ $p->alamat }}</td>
              <td>{{ $p->prov }}</td>
              <td>{{ $p->kd_pos }}</td>
              <td>{{ $p->telp }}</td>
              <td>{{ $p->status }}</td>
              <td><img class="img-responsive" 
                src="{{ asset('uploads/bukti_trans/'.$p->bukti) }}" alt="" width="50" height="50">
                </td>
              <td>
                  <form class="" action="{{ route('reports.detail') }}" method="POST">
                      {{ csrf_field() }}
                  <input type="hidden" name="formid" value="{{ $p->formid }}">
                  <input type="submit" class="btn btn-success" value="Detail">
                  </form>
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
  @endsection