<!DOCTYPE html>
<html>
<head>
<style>
table {
    border: 1px;
    width: 100%;
    border-color: black;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color:black;
    color: white;
}
</style>
</head>
<body>

<center>
  <h1>MACLOTH-ID</h1>
  <h2>Laporan Transaksi Penjualan</h2>
  <h4>Periode {{$fromDate}} - {{$toDate}}</h4>
</center>

<table>
  <tr>
    <th>Kode Pemesanan</th>
    <th>Nama Pembeli</th>
    <th>Tanggal</th>
    <th>Jumlah barang</th>
    <th>Total Pembelian (Rp)</th>
  </tr>
  @foreach($pembeli as $p)
  <tr>
      <td>{{ $p->formid }}</td>
      <td>{{ $p->nama }}</td>
      <td>{{ $p->created_at }}</td>
      <td>{{ $p->jml_brg }}</td>
      <td>{{ number_format($p->total, 2) }}</td>
</tr>
@endforeach
</table>
<table style="width:38%; float:right">
  <tr>
  <th>Total Barang</th>
  <th>Total Pendapatan (Rp)</th>
  </tr>
  <tr>
  <td>{{$sumjml}}</td>
  <td>{{ number_format($sumharga, 2) }}</td>
  </tr>

</body>
</html>
