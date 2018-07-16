<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $fillable = ['name', 'harga', 'category', 'qty', 'keterangan',
                            'img1', 'img2', 'img3', 'status', 'id_product'];

    public function transaksi() {
        return $this->hasMany('App\Transaksi', 'id_product');
    }
}
