@extends('layouts.navclient')

    
@section('content')
<div id="page-title">

    <div id="page-title-inner">

        <!-- start: Container -->
        <div class="container">

            <h2><i class="ico-cart-in ico-white"></i>Keranjang</h2>

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
        <div class="title"><h3>Detail Keranjang Belanja</h3></div>
<table class="table table-hover table-condensed">
<tr>
                <th><center>No Pembelian</center></th>
                <th><center>Kode Barang</center></th>
                <th><center>Nama Barang</center></th>
                <th><center>Jumlah</center></th>
                <th><center>Harga Satuan</center></th>
                <th><center>Sub Total</center></th>
                <th><center>Opsi</center></th>
            </tr>
            
            @foreach($cart_content as $cart)
            @php  
            $i = 1;
            @endphp

            <tr>
            <td><center>{{ $i++ }}</center></td>
            <td><center>{{ $cart->id }}</center></td>
            <td><center>{{ $cart->name }}</center></td>
            <td><center>{{ $cart->qty }}</center></td>
            <td><center>{{ number_format($cart->price, 2) }}</center></td>
            <td><center>{{ number_format($cart->subtotal, 2) }}</center></td>
            <td><center>
                <a href="{{ route('toko.cartadd', $cart->id) }}" class="btn btn-xs btn-success">Tambah</a> 
                <a href="{{ route('toko.cartmin', $cart->id) }}" class="btn btn-xs btn-warning">Kurang</a> 
                <a href="{{ route('toko.cartdel', $cart->id) }}" class="btn btn-xs btn-danger">Hapus</a></center></td>
            </tr>
            @endforeach
            @if (sizeof(Cart::content()) > 0)	
						<tr style="background-color: #DDD;"><td colspan="4" align="right"><b>Total :</b></td><td align="right"><b>{{number_format(Cart::total(), 2)}}</b></td></td></td><td></td></tr></table>
						<p><div align="right">
                        <a href="{{ url('/') }}" class="btn btn-info btn-lg">Continue Shopping</a>
                        <a href="{{ route('toko.checkout') }}" class="btn btn-success"><i class="mini-ico-check mini-white"></i> CHECK OUT</a>
                    </div></p>
            @else
            <tr><td colspan="5" align="center">Keranjang kosong!</td></tr></table>
					<p><div align="right">
						<a href="{{ url('/') }}" class="btn btn-info btn-lg">Continue Shopping</a>
                        </div></p>
        
            @endif
        <!-- end: Table -->

    </div>
    <!-- end: Container -->
            
</div>
@endsection