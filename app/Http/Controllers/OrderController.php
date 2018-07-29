<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

use DB;
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

class OrderController extends Controller
{
    public function index(){
        $pembeli = Pembeli::where('status', '=', 'Unpaid')->orWhere('status', '=', 'Paid')->orderBy('id', 'desc')->get();

        return view('admin.order.index', compact('pembeli'));
    }

    public function edit(Request $request){
        $formid = Input::get('formid');
        $transaksi = Transaksi::whereHas('product', function($q) {
            $formid = Input::get('formid');
            $q->where('formid', '=', $formid);
        })->get();

        $pembeli = Pembeli::where('formid', '=', $formid)->first();
        

        return view('admin.order.edit', compact('pembeli', 'transaksi'));
    }

    public function update(Pembeli $pembeli) {
        $pembeli->update([
            'status' => request('status'),
        ]);

        return redirect()->route('order.index')->with('success', 'Order Diperbarui');
    }

    public function destroy(Request $request){
        $formid = Input::get('formid');
        $transaksi = Transaksi::whereHas('product', function($q) {
            $formid = Input::get('formid');
            $q->where('formid', '=', $formid);
        })->delete();

        $pembeli = Pembeli::where('formid', '=', $formid)->delete();

        return redirect()->route('order.index')->with('success', 'Order Dihapus');
    }
}
