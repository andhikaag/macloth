<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facedes\Cart;
use Illuminate\Support\Facades\Input;

use App\Product;
use App\Slide;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use Session;
use hash;


class ProductController extends Controller
{

    public function index_admin(){
        $product = Product::all();
        return view('admin.product.index')->with('product', $product);
    }

    public function create(){

        return view('admin.product.create');
    }

    public function store(Request $request){
        $input = array_except(Input::all(), '_method');
        Product::create($input);

        return redirect()->route('product.index')->with('success', 'Product Ditambah');
    }

    public function destroy(Product $product){
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product Dihapus');
    }

    public function edit($id){
        $product = Product::find($id);

        return view('admin.product.edit', compact('product'));
    }

    public function update(Product $product){
        $product->update([
            'id' => request('id'),
            'name' => request('name'),
            'harga' => request('harga'),
            'category' => request('category'),
            'stok' => request('stok'),
            'keterangan' => request('keterangan'),
            'gambar' => request('gambar'),
            'status' => request('status'),
        ]);

        return redirect()->route('product.index');
    }
}
