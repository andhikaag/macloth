<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    protected $table = 'pembeli';
    protected $fillable = ['nama', 'telp', 'alamat', 'prov', 'kd_pos', 'status', 'note', 'bukti', 'formid', 'jml_brg', 'total'];

    public function transaksi(){
        return $this->hasMany('App\Transaksi', 'formid');
    }
}
