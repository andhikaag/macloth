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
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index_admin(){
        $product = Product::all();
        return view('admin.product.index')->with('product', $product);
    }

    public function create(){

        return view('admin.product.create');
    }

    public function store(Request $request){

        /**if (Input::hasFile('img1')) {
            $filenameWithExt = Input::file('img1')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = Input::file('img1')->getClientOriginalExtension();
            $filenamefix = $filename.'_'.time().'.'.$extension;
            $path = Input::file('img1')->move('product_img', $filenamefix);
        } else {
            $filenamefix = 'noimage';
        }

        if (Input::hasFile('img2')) {
            $filenameWithExt = Input::file('img2')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = Input::file('img2')->getClientOriginalExtension();
            $filenamefix2 = $filename.'_'.time().'.'.$extension;
            $path = Input::file('img2')->move('product_img', $filenamefix);
        } else {
            $filenamefix2 = 'noimage';
        }

        if (Input::hasFile('img3')) {
            $filenameWithExt = Input::file('img3')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = Input::file('img3')->getClientOriginalExtension();
            $filenamefix3 = $filename.'_'.time().'.'.$extension;
            $path = Input::file('img3')->move('product_img', $filenamefix);
        } else {
            $filenamefix3 = 'noimage';
        }*/

        $product = new Product();

        $product->name = $request['name'];
        $product->harga = $request['harga'];
        $product->category = $request['category'];
        $product->keterangan = $request['keterangan'];
        $product->status = $request['status'];
        $img1 = Input::file('img1');
        $img2 = Input::file('img2');
        $img3 = Input::file('img3');

        if($img1 == null){
            $product->img1 = 'noimage';
        } else{

        $ext = $img1->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $img1->move('uploads/product_img',$newName);
        $product->img1 = $newName;
        }
        if($img2 == null){
            $product->img2 = 'noimage';
        } else{
        $ext = $img2->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $img2->move('uploads/product_img',$newName);
        $product->img2 = $newName;
        }
        if($img3 == null){
            $product->img3 = 'noimage';
        } else{
        $ext = $img3->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $img3->move('uploads/product_img',$newName);
        $product->img3 = $newName;
        }
        //$product->img1 = $filenamefix;
        //$product->img2 = $filenamefix2;
        //$product->img3 = $filenamefix3;
        $product->save();
        
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

        $product->name = request('name');
        $product->harga = request('harga');
        $product->category = request('category');
        $product->keterangan = request('keterangan');
        $product->status = request('status');
        $img1 = Input::file('img1');
        $img2 = Input::file('img2');
        $img3 = Input::file('img3');

        if($img1 == null){
            $product->img1;
        } else{

        $ext = $img1->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $img1->move('uploads/product_img',$newName);
        $product->img1 = $newName;
        }
        if($img2 == null){
            $product->img2;
        } else{
        $ext = $img2->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $img2->move('uploads/product_img',$newName);
        $product->img2 = $newName;
        }
        if($img3 == null){
            $product->img3;
        } else{
        $ext = $img3->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $img3->move('uploads/product_img',$newName);
        $product->img3 = $newName;
        }
        //$product->img1 = $filenamefix;
        //$product->img2 = $filenamefix2;
        //$product->img3 = $filenamefix3;
        $product->save();

        
        //$product->update([
          //  'name' => request('name'),
          //  'harga' => request('harga'),
         ///   'category' => request('category'),
         //   'keterangan' => request('keterangan'),
         //   'img1' => request('img1'),
         //   'img2' => request('img2'),
         //   'img3' => request('img3'),
         //   'status' => request('status'),
       // ]);

        return redirect()->route('product.index')->with('success', 'Product Diubah');;
    }

    public function detail($id){
        $product = Product::find($id);

        return view('admin.product.detail', compact('product'));
    }
}
