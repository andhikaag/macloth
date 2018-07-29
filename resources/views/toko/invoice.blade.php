<!DOCTYPE html>
<head>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <style type="text/css">
div#underline{
    border-bottom: 6px solid black;
}
h1 {
  font-size: 36px;
  line-height: 40px;
}
h3 {
  font-size: 24px;
  line-height: 40px;
}
    </style>
</head>
<body>
<!-- end: Page Title -->

<!--start: Wrapper-->
            
    <!-- start: Container -->
        <!-- start: Table -->
        <h1>Macloth-ID</h1>
        <center>
        <div id="underline"><h3>Invoice Pembelian Barang</h3></div>
        </center>
        <div style="float:right;">
                <h3>
                        Tanggal Order
                      </h3>
                      <address>
                      <strong>{{$pembeli->created_at}}</strong>
                      </address>
        </div>
        <div style="width: 100px;">
                <h3>
                 Pembeli
                 </h3>
                 <address>
                   <strong>{{$pembeli->nama}}</strong><br>
                   {{$pembeli->alamat}}<br>
                   {{$pembeli->telp}}</br>
                   <br>{{$pembeli->prov}}, {{$pembeli->kd_pos}}
                   <p><strong>{{$pembeli->formid}}</strong></p>
                 </addres><br>
                </div>
                 <div id="underline"></div>
<table style="width: 100%;margin-bottom: 20px; padding: 8px;line-height: 20px;text-align: left;vertical-align: top;
border-top: 1px solid #dddddd; ">
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
<table style="width: 100%;margin-bottom: 20px; padding: 8px;line-height: 20px;text-align: left;vertical-align: top;
border-top: 1px solid #dddddd; ">
<tr>
    <th style="width:25%">Jumlah produk:</th>
    <td>{{$pembeli->jml_brg}}</td></tr>
    <tr>
    <th style="width:25%">Total:</th>
     <td>{{$pembeli->total}}</td>
  </tr>
</table>
<h3>
    Note :
</h3>
<strong>{{$pembeli->note}}</strong>       
    </div>
</div>
</body>
</html>
