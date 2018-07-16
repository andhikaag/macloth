<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = ['id_product', 'id_search', 'qty', 'total', 'subtotal', 
    'status', 'nama', 'telp', 'alamat', 'prov', 'kd_pos'];

    public function product() {
        return $this->belongsTo('App\Product','id_product');
    }
}
