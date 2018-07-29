@extends('layouts.navclient')

    
@section('content')
<div class="slider-wrapper">

		<div id="da-slider" class="da-slider">
			<div class="da-slide">
				<h2>Jacket Keren</h2>
				<p>Kami menyediakan koleksi jacket yang paling murah, keren, dan tentunya sesuai dengan style anda.</p>
				<div class="da-img"><img src="{{ asset('img/parallax-slider/1.png')}}" alt="image01" /></div>
			</div>
			<div class="da-slide">
				<h2>Piyama Lucu</h2>
				<p>Kami menyediakan koleksi piyama yang paling murah, lucu, dan cocok dipakai untuk kegiatan tidur anda karena bahan yang nyaman.</p>
				<div class="da-img"><img src="{{ asset('img/parallax-slider/2.png')}}" alt="image02" /></div>
			</div>
			<div class="da-slide">
				<h2>Kemeja</h2>
				<p>Kami menyediakan koleksi kemeja yang paling murah dan sesuai dengan selera fashion anda.</p>
				<div class="da-img"><img src="{{ asset('img/parallax-slider/aa.png')}}" alt="image03" /></div>
			</div>
			<nav class="da-arrows">
				<span class="da-arrows-prev"></span>
				<span class="da-arrows-next"></span>
			</nav>
		</div>
		
	</div>
	<!-- end: Slider -->
			
	<!--start: Wrapper-->
	<div id="wrapper">

		<!--start: Container -->
    	<div class="container">
				<div class="table-responsive">
					<form id="formku" action="{{ route('toko.kategori') }}" method="get">
						{{csrf_field()}} 
						<table class="table table-condensed">
								<label for="prov">Search Berdasarkan kategori</label>
								<tr>
								  <th><select name="category">
									  <option selected></option>
									  <option value="Shirt">Shirt</option>
									<option value="Sweater">Sweater</option>
									<option value="T-Shirt">T-Shirt</option>
									<option value="Dress">Dress</option>
									<option value="Jacket">Jacket</option>
									  </select></th></tr>
									  <tr><td><input type="submit" value="Submit" class="btn btn-sm btn-primary"/></td></tr></table>
										</form></div>
      		<!-- start: Row -->
            
      		<div class="row">
            @foreach($product as $item)
        		<div class="span4">
          			<div class="icons-box">
                        <div class="title"><h3>{{ $item->name }}</h3></div>
                        <img src="{{ asset('uploads/product_img/'.$item->img1) }}" width="220" height="240" />
						<div><h3>Rp.{{ number_format($item->harga, 2) }}</h3></div>
					<!--	<p>
						
						</p> -->
            <div class="clear">
              <a href="{{ route('toko.detail', $item) }}" class="btn btn-lg btn-danger">Detail</a> 
              <a href="{{ route('toko.addtocart', $item->id) }}"class="btn btn-lg btn-success">Beli &raquo;</a>
            </div>
					
                </div>
        		</div>
<!---->     @endforeach
      		</div>
			<!-- end: Row -->
		
			<hr>
			
			<!-- start: Row -->
			<div class="row">
				
				<!-- start: Icon Boxes -->
				<div class="icons-box-vert-container">

					<!-- start: Icon Box Start -->
					<div class="span6">
						<div class="icons-box-vert">
							<i class="ico-ok ico-color circle-color big"></i>
							<div class="icons-box-vert-info">
								<h3>Kemudahan Berbelanja</h3>
								<p>Dapatkan kemudahan berbelanja di Macloth-ID Kami menyediakan kebutuhan untuk fasion anda.</p>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<!-- end: Icon Box-->

					<!-- start: Icon Box Start -->
					<div class="span6">
						<div class="icons-box-vert">
							<i class="ico-cup  ico-white circle-color-full big-color"></i>
							<div class="icons-box-vert-info">
								<h3>Pengiriman Delivery</h3>
								<p>Dapatkan kemudahan pengiriman barang ke rumah anda.</p>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<!-- end: Icon Box -->

					<!-- start: Icon Box Start -->
					<div class="span6">
						<div class="icons-box-vert">
							<i class="ico-ipad ico-color circle-color big"></i>
							<div class="icons-box-vert-info">
								<h3>Berbelanja Dengan Gadget</h3>
								<p>Anda bisa memesan produk kami melalui gadget kesayangan anda, belanja jadi lebih praktis dan mudah.</p>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<!-- end: Icon Box -->

					<!-- start: Icon Box Start -->
					<div class="span6">
						<div class="icons-box-vert">
							<i class="ico-thumbs-up  ico-white circle-color-full big-color"></i>
							<div class="icons-box-vert-info">
								<h3>Sosial Media</h3>
								<p>Follow Instagram dan Line kami untuk mengetahui update seputar produk kami.</p>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<!-- end: Icon Box -->

				</div>
				<!-- end: Icon Boxes -->
				<div class="clear">
					
				</div>
			</div>
			<!-- end: Row -->
			
			<hr>
			
		</div>
		<!--end: Container-->
	
	</div>
	<!-- end: Wrapper  -->	
@endsection