@extends('layouts.navclient')

    
@section('content')
<div id="page-title">

    <div id="page-title-inner">

        <!-- start: Container -->
        <div class="container">

            <h2><i class="ico-usd ico-white"></i>Checkout Keranjang</h2>

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
             <div class="table-responsive">

             <div class="title"><h3>Form Checkout</h3></div>
             <div class="hero-unit">Harap isi form dibawah ini dengan lengkap dan benar sesuai idenditas anda!</div> 
<form id="formku" action="{{ route('checkout.proc') }}" method="post">
    {{csrf_field()}} 
<table class="table table-condensed">
<tr>
    <td><label for="nama">Nama</label></td>
    <td><input name="nama" type="text" placeholder="Masukkan Nama Anda..." required /></td>
  </tr>
  <input name="{{'formid'}}" type="hidden" value="{{$formid}}"/>
  <input name="{{'jml_brg'}}" type="hidden" value="{{$jml_brg}}"/>
  <input name="{{'total'}}" type="hidden" value="{{$total}}"/>
  <tr>
    <td><label for="email">Email</label></td>
    <td><input name="email" type="email" placeholder="Masukkan Email Anda..." required/></td>
  </tr>
  <tr>
      <td><label for="telp">No telepon</label></td>
      <td><input name="telp" type="text" placeholder="Masukkan Nomor Telepon" class="required number" minlength="11" maxlength="12" required/></td>
  </tr>
  <tr>
    <td><label for="alamat">Alamat</label></td>
    <td><input name="alamat" type="text" placeholder="Masukkan Alamat Anda..." required/></td>
  </tr>
  <tr>
      <td><label for="prov">Provinsi</label></td>
      <td><select name="prov" required>
          <option selected></option>
          <option value="Nanggro Aceh Darussalam">Nanggro Aceh Darussalam</option>
          <option value="Sumatra Utara">Sumatra Utara</option>
          <option value="Sumatra Barat">Sumatra Barat</option>
          <option value="Riau">Riau</option>
          <option value="Kepulauan Riau">Kepulauan Riau</option>
          <option value="Jambi">Jambi</option>
          <option value="Sumatra Selatan">Sumatra Selatan</option>
          <option value="Bangka Belitung">Bangka Belitung</option>
          <option value="Bengkulu">Bengkulu</option>
          <option value="Lampung">Lampung</option>
          <option value="DKI Jakarta">DKI Jakarta</option>
          <option value="Jawa Barat">Jawa Barat</option>
          <option value="Banten">Banten</option>
          <option value="Jawa Tengah">Jawa Tengah</option>
          <option value="Daerah Istimewa Yogyakarta">Daerah Istimewa Yogyakarta</option>
          <option value="Jawa Timur">Jawa Timur</option>
          <option value="Bali">Bali</option>
          <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
          <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
          <option value="Kalimantan Barat">Kalimantan Barat</option>
          <option value="Kalimantan Tengah">Kalimantan Tengah</option>
          <option value="Kalimantan Selatan">Kalimantan Selatan</option>
          <option value="Kalimantan Timur">Kalimantan Timur</option>
          <option value="Kalimantan Utara">Kalimantan Utara</option>
          <option value="Sulawesi Utara">Sulawesi Utara</option>
          <option value="Sulawesi Barat">Sulawesi Barat</option>
          <option value="Sulawesi Tengah">Sulawesi Tengah</option>
          <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
          <option value="Sulawesi Selatan">Sulawesi Selatan</option>
          <option value="Gorontalo">Gorontalo</option>
          <option value="Maluku">Maluku</option>
          <option value="Maluku Utara">Maluku Utara</option>
          <option value="Papua Barat">Papua Barat</option>
          <option value="Papua">Papua</option>
      </select>
      </td>
    </tr>
  <tr>
    <td><label for="kd_pos">Kode Pos</label></td>
    <td><input name="kd_pos" type="text" placeholder="Masukkan Kode Pos" class="required number" minlength="5" maxlength="5" required/></td>
  </tr>
 <tr>
    <td><label>Note</label></td>
    <td><textarea class="form-control" name="note" rows="3" placeholder="Masukkan ukuran/warna atau tambahan lain" required></textarea></td>
 </tr>
    <td><input name="status" type="hidden" value="Unpaid" class="" id="kp_usr" /></td>
    <td><input name="bukti" type="hidden" value="-" placeholder="" class="" id="kp_usr" /></td>
  <td></td>
    <td><input type="submit" value="Simpan Data" name="finish"  class="btn btn-sm btn-primary"/>&nbsp;<a href="{{ url('/') }}" class="btn btn-sm btn-danger">Kembali</a></td>
    </tr>
</table>
</form>
               </div>
            
        <!-- end: Table -->

    </div>
    <!-- end: Container -->
            
</div>
@endsection