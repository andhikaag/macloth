<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

use App\Product;
use App\Transaksi;
use App\Slide;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Redirect;
use Session;
use hash;

class TokoController extends Controller
{
    public function index(){
        $product = Product::all();
        $slide = Slide::all();
        return view('toko.welcome')->with('product', $product, 'slide', $slide);
    }

    public function showItem($id){
        $product = Product::find($id);
        return view('toko.detail', compact('product'));
    }

    public function cart(){
        $cart_content = Cart::content();

        return view('toko.cart')->with('cart_content', $cart_content);
    }
    
    public function addtoCart($id){
        $product = Product::find($id);
            $id     = $product->id;
            $name   = $product->name;
            $qty    = 1;
            $harga  = $product->harga;
            $subtotal = Cart::subtotal();
            $total = Cart::total();
            $data = array(
                'id'    => $id,
                'name'  => $name,
                'qty'   => $qty,
                'price' => $harga,
                'subtotal' => $subtotal,
                'total' => $total,
             'option' => array('size' => 'large'));

             Cart::add($data);
             $cart_content = Cart::content();
             
        return view('toko.cart')->with('cart_content', $cart_content);
    }

    public function updateCartTambah($id){
        $product = Product::find($id);
        $id = $product->id;
        
        $item = Cart::search(function($key, $value) use ($id){ 
            return $key->id == $id; 
        })->first();
        Cart::get($item->rowId);

        Cart::update($item->rowId, $item->qty + 1);
        $cart_content = Cart::content();

        return view('toko.cart')->with('cart_content', $cart_content);
    }

    public function updateCartKurang($id){
        $product = Product::find($id);
        $id = $product->id;
        
        $item = Cart::search(function($key, $value) use ($id){ 
            return $key->id == $id; 
        })->first();
        Cart::get($item->rowId);

        Cart::update($item->rowId, $item->qty - 1);
        $cart_content = Cart::content();

        return view('toko.cart')->with('cart_content', $cart_content);
    }

    public function hapus($id){
        $product = Product::find($id);
        $id = $product->id;

        $item = Cart::search(function($key, $value) use ($id){ 
            return $key->id == $id; 
        })->first();

        Cart::remove($item->rowId);
        $cart_content = Cart::content();

        return view('toko.cart')->with('cart_content', $cart_content);  
    }

    public function form(){
        
    }

    public function checkout(){
        $id_search = str_random();
        $cart_content = Cart::content();

        foreach($cart_content as $cart) {
            $transaksi = new Transaksi();
            $product = Product::find($cart->id);
            $transaksi->id_product = $cart->id;
            $transaksi->id_search = $id_search;
            $transaksi->tgl = date('Ymd');
            $transaksi->qty = $cart->qty;
            $transaksi->total = Cart::total();
            $transaksi->subtotal = $cart->subtotal;
            $transaksi->status = 'Unpaid, Pesanan Diajukan';
            $transaksi->save();
        }

        Cart::destroy();
        return view('toko.checkout')->with('id_search', $id_search);
    }
}
