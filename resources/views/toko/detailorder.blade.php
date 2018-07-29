
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
        <!-- start: Table -->
        <div class="title"><h3>Cek Status Order</h3></div>
        <div class="row">

                <!-- start: About -->
                <div class="span5">
                    
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
                
                <div class="span4">
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
                <!-- end: Photo Stream -->
    
                <div class="span2">
                        <h3>
                                Kode Pemesanan
                              </h3>
                              <address>
                              <strong>{{$pembeli->formid}}</strong>
                              </address>
                              <h3>
                                Status
                                </h3>
                                <address>
                                <strong>{{$pembeli->status}}</strong>
                                </address>
                   
                
                </div>
                
            </div>
<table class="table table-hover table-condensed">
<tr>
        <th>Qty</th>
        <th>Produk</th>
        <th>Id Produk</th>
        <th>Harga</th>
        <th>Subtotal</th>
</tr>
@foreach($transaksi as $t)
<tr>
<td>{{$t->qty}}</td>
<td>{{$t->product->name}}</td>
<td>{{$t->id_product}}</td>
<td>{{$t->product->harga}}</td>
<td>{{$t->subtotal}}</td>
</tr>
@endforeach
</table> 
<table class="table table-hover table-condensed">
<tr>
    <th style="width:25%">Jumlah produk:</th>
    <td>{{$pembeli->jml_brg}}</td></tr>
    <tr>
    <th style="width:25%">Total:</th>
     <td>{{$pembeli->total}}</td>
  </tr>
</table>       
    </div>
</div>
@endsection