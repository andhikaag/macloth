<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

use App\Product;
use App\Transaksi;
use App\Pembeli;
use App\Slide;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Redirect;
use Session;
use hash;
use PDF;

class TokoController extends Controller
{
    public function index(){
        $product = Product::all();
        return view('toko.welcome')->with('product', $product);
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

    public function checkout(){
        $formid = str_random();
        $cart_content = Cart::content();

        foreach($cart_content as $cart) {
            $transaksi = new Transaksi();
            $product = Product::find($cart->id);
            $transaksi->id_product = $cart->id;
            $transaksi->formid = $formid;
            $transaksi->qty = $cart->qty;
            $transaksi->subtotal = $cart->subtotal;
            $transaksi->save();
        }
        $total = Cart::total();
        $jml_brg = Cart::count();
        return view('toko.checkout', compact('jml_brg', 'formid', 'total'));
    }

    public function form_pembeli(Request $request){
        $input = Input::all();
        Pembeli::create($input);
        Cart::destroy();
        $formid = Input::get('formid');
        $notrans = Transaksi::where('formid', '=', $formid)->first();
        $transaksi = Transaksi::whereHas('product', function($q) {
            $formid = Input::get('formid');
            $q->where('formid', '=', $formid);
        })->get();

        $pembeli = Pembeli::where('formid', '=', $formid)->first();
        return view('toko.checkorder', compact('notrans', 'transaksi', 'pembeli'));
    }

    public function checkorder(){
    
        return view('toko.checkorder');
    }

    public function searchorder(){
    $search = $_GET['search'];

    $pembeli = Pembeli::where('formid','=',$search)->first();
  


    return view('toko.checkorder', compact('pembeli'));
    }

    public function orderdetail(Request $request){
        $formid = Input::get('formid');
        $transaksi = Transaksi::whereHas('product', function($q) {
            $formid = Input::get('formid');
            $q->where('formid', '=', $formid);
        })->get();

        $pembeli = Pembeli::where('formid', '=', $formid)->first();
        

        return view('toko.detailorder', compact('pembeli', 'transaksi'));
    }

    public function uploadTrans(Pembeli $pembeli){
        $bukti = Input::file('bukti');

        $ext = $bukti->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $bukti->move('uploads/bukti_trans',$newName);

        $pembeli->update([
            'bukti' => $newName,
        ]);

        return back()->with('alert-success', 'Berhasil Upload!, Pesanan akan segera diproses dan status order akan segera diperbarui');
    }

    public function invoice(Request $request){
        $formid = Input::get('formid');
        $transaksi = Transaksi::whereHas('product', function($q) {
            $formid = Input::get('formid');
            $q->where('formid', '=', $formid);
        })->get();

        $pembeli = Pembeli::where('formid', '=', $formid)->first();

        $pdf = PDF::loadView('toko.invoice', compact('pembeli', 'transaksi'));
        $pdf->save(storage_path().'_filename.pdf');
        return $pdf->download('invoice.pdf');
        //return view('toko.invoice', compact('pembeli', 'transaksi'));
    }

    public function kategori(){
        $category = $_GET['category'];
        $product = Product::where('category', '=', $category)->get();

        return view('toko.welcome', compact('product'));
    }

    public function howTo(){
        return view('toko.carapesan');
    }
}
