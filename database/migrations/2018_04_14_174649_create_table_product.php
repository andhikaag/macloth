<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function($table){
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->integer('harga', false, true)->length(10);
            $table->integer('stok', false, true)->length(3);
            $table->string('keterangan',1000);
            $table->string('gambar');
            $table->string('status',20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product');
    }
}
