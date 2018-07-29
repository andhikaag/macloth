@extends('layouts.navclient')

@section('content')
<div id="page-title">

	<div id="page-title-inner">

		<!-- start: Container -->
		<div class="container">
			<h2><i class="ico-stats ico-white"></i>Produk Detail Produk</h2>

		</div>
			<!-- end: Container  -->

	</div>	

</div>
<div class="container">
<div class="row">
        <div class="col-sm-6">
            <center>
                <div id="myCarousel" class="carousel slide" style="width: 500px; height:250px;">
                        <div class="carousel-inner">
                          <div class="item active">
                              <a href="{{ asset('uploads/product_img/'.$product->img1) }}">
                                <img src="{{ asset('uploads/product_img/'.$product->img1) }}" width="220" height="240"  alt="" />
                              </a>
                          </div>
                          <div class="item">
                                <a href="{{ asset('uploads/product_img/'.$product->img2) }}">
                                <img src="{{ asset('uploads/product_img/'.$product->img2) }}" width="220" height="240" alt="" />
                                </a>
                          </div>
                          <div class="item">
                                <a href="{{ asset('uploads/product_img/'.$product->img3) }}">
                            <img src="{{ asset('uploads/product_img/'.$product->img3) }}" width="220" height="240" alt="" />
                                </a>
                          </div>
                        </div>
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
                      </div><!-- /.carousel -->
            </center>
            <!--<div class="span4">-->
                  <!--<div class="icons-box">-->
                <div class="hero-unit" style="margin-left: 20px;">
                <table>
                <tr>
                <td rowspan="7">
                </td>
                    </tr>
                    <tr>
                    <td colspan="4"><div class="title"><h3>{{ $product->name }}</h3></div></td>
                    </tr>
                    <tr>
                    <td></td>
                    <td width="200"><h3>Harga</h3></td>
                    <td width="20"><h3>:</h3></td>
                    <td><div><h3>Rp.{{ number_format($product->harga, 2) }}</h3></div></td>
                    </tr>
                    <tr>
                    <td></td>
                    <td><h3>Stock</h3></td>
                    <td><h3>:</h3></td>
                    <td><div><h3>{{ $product->status }}</h3></div></td>
                    </tr>
                    <tr>
                    <td></td>
                    <td><h3>Kategori</h3></td>
                    <td><h3>:</h3></td>
                    <td><div><h3>{{ $product->category }}</h3></div></td>
                    </tr>
                    <tr>
                    <td></td>
                    <td><h3>Keterangan</h3></td>
                    <td><h3>:</h3></td>
                    <td><div><h3>{{ $product->keterangan }}</h3></div></td>
                    </tr>
                <!--	<p>
                    
                    </p> -->
                    <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    </tr>
 
                </table>
                <br>
                <div class="clear"><a href="{{ route('toko.addtocart', $product->id) }}" class="btn btn-lg btn-success">Beli</a></div>
                </div>
                <!--</div> -->
            <!--</div> -->
<!---->
          </div>
        <!-- end: Row -->
                
                
            </div>	
            
                
            </div>
            
            </div>
        </div>
        <!--end: Row-->

    </div>
@endsection