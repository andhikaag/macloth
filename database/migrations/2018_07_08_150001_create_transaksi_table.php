<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_search',12);
            $table->string('id_product');
            $table->date('tgl');
            $table->string('qty');
            $table->string('total');
            $table->string('subtotal');
            $table->string('status');
            $table->string('nama');
            $table->string('telp',12);
            $table->string('alamat',500);
            $table->string('prov');
            $table->string('kd_pos',10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
