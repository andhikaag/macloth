
@extends('layouts.navclient')

    
@section('content')
<div id="page-title">

    <div id="page-title-inner">

        <!-- start: Container -->
        <div class="container">

            <h2><i class="ico-search ico-white"></i>Cek Order</h2>

        </div>
        <!-- end: Container  -->

    </div>	

</div>
<!-- end: Page Title -->

<!--start: Wrapper-->
<div id="wrapper">
            
    <!-- start: Container -->
    <div class="container">
            @if(Session::has('alert-success'))
            <div class="alert alert-success">
                <strong>{{ Session::get('alert-success') }}</strong>
            </div>
            @endif

        <!-- start: Table -->
        <div class="title"><h3>Cek Status Order</h3></div>
        <p>*Silahkan masukkan kode pemesanan pada kolom di bawah</p>
<form action="{{ route('search.order') }}" method="get" class="form">
    <div class="form-group">
          <input type="text" name="search" @if(isset($pembeli)) value="{{$pembeli->formid}}" @endif placeholder="Search..."><br>
          <input type="submit" value="Search" class="btn btn-primary">
    </div>
      </form>

@if(isset($pembeli))
<center><b>kode Pemesanan</b><br>
    <h1>{{$pembeli->formid}}</h1></center>
<center><b>Tanggal Pemesanan</b><br>
    <h1>{{$pembeli->created_at}}</h1></center>
    <table>
        <tr>
<td width="200"><h3>Nama Pemesan</h3></td><td><h3>:</h3></td></h3><td> <h2>{{$pembeli->nama}}</h2></td>
        </tr>
        <tr>
@if($pembeli->status == 'Unpaid')

<div class="hero-unit">Harap simpan kode pemesanan untuk melakukan upload bukti transfer</div>
<td width="200"><h3>Status Pemesanan</h3></td><td><h3>:</h3></td><td> 
<h2><font color="red">{{$pembeli->status}}</font>, Silahkan melakukan pembayaran ke no.rek <u>6040510514</u>(BCA). Atas nama : MERRY NATASTHA WIJAYA</h2></td></tr></table>
<form class="" action="{{ route('order.detail') }}" method="POST">
        {{ csrf_field() }}
    <input type="hidden" name="formid" value="{{ $pembeli->formid }}">
    <input type="submit" class="btn btn-primary" value="Detail Pemesanan">
    </form>
<P>*Jika sudah melakukan transfer silahkan upload bukti transfer ke kolom di bawah ini</P>
<form class="" action="{{ route('upload.trans', $pembeli) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{method_field('PATCH')}}
    <input type="file" name="bukti"><br><br>
    <input type="submit" class="btn btn-success" value="Upload">
    </form>

@elseif($pembeli->status == 'Paid')


<td width="200"><h3>Status Pemesanan</h3></td><td><h3>:</h3></td><td><h2><font color="blue">{{$pembeli->status}}</font>, Pesanan Diproses</h2></td></tr></table>
<form class="" action="{{ route('order.detail') }}" method="POST">
        {{ csrf_field() }}
    <input type="hidden" name="formid" value="{{ $pembeli->formid }}">
    <input type="submit" class="btn btn-primary" value="Detail Pemesanan">
    </form>
    <form class="" action="{{ route('order.invoice') }}" method="POST">
        {{ csrf_field() }}
    <input type="hidden" name="formid" value="{{ $pembeli->formid }}">
    <input type="submit" class="btn btn-primary" value="Cetak Invoice">
    </form>

@elseif($pembeli->status == 'Shipped')


<td width="200"><h3>Status Pemesanan</h3></td><td><h3>:</h3></td><td><h2><font color="yellow">{{$pembeli->status}}</font>, Pesanan Dikirim</h2></td></tr></table>  
<form class="" action="{{ route('order.detail') }}" method="POST">
    {{ csrf_field() }}
<input type="hidden" name="formid" value="{{ $pembeli->formid }}">
<input type="submit" class="btn btn-primary" value="Detail Pemesanan">
</form>          
        </tr>
        @endif
    </table>
@endif
    </div>
</div>
@endsection