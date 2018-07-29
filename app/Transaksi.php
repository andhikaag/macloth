<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = ['id_product', 'formid', 'qty', 'subtotal'];

    public function product() {
        return $this->belongsTo('App\Product','id_product');
    }

    public function pembeli() {
        return $this->belongsTo('App\pembeli', 'formid');
    }
}
