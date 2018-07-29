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
      <h3 class="box-title">Tabel Order</h3>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div><br>
@endif
     @if (\Session::has('success'))
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Alert!</h4>
        <p>{{\Session::get('success')}}</p>
    </div>
    @endif
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
          <th>Tanggal</th>
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
              <td>{{ $p->created_at }}<td>
                  <form class="" action="{{ route('order.edit') }}" method="POST">
                      {{ csrf_field() }}
                  <input type="hidden" name="formid" value="{{ $p->formid }}">
                  <input type="submit" class="btn btn-success" value="Edit">
                  </form>
                  <form class="" action="{{ route('order.destroy') }}" method="POST">
                      {{ csrf_field() }}
                  <input type="hidden" name="formid" value="{{ $p->formid }}">
                  <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
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