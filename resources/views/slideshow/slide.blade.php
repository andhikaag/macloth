@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <form method="post" action="" enctype="multipart/form-data">
                {{csrf_field()}} 
                <div class="row">           
                    <div class="col-md-4"></div>           
                    <div class="form-group col-md-4">             
                        <label for="name">Slide:</label>             
                        <input type="file" class="form-control" name="slide">         
                    </div>
                    <div class="row">           
                        <div class="col-md-4"></div>           
                        <div class="form-group col-md-4">             
                            <button type="submit" class="btn btn-success" style="marginleft:38px">Tambahkan Produk
                            </button>           
                        </div>         
                    </div>
                </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
