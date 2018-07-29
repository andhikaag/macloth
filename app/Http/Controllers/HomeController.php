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

class HomeController extends Controller
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
    public function index()
    {
        $pembeli = DB::table('pembeli')
        ->select(
            DB::raw("day(created_at) as day"),
            DB::raw("SUM(jml_brg) as total")) 
            ->orderBy("created_at")
            ->groupBy(DB::raw("day(created_at)"))
            ->get();
            
        $result[] = ['Day','Product'];
        foreach ($pembeli as $key => $value) {
        $result[++$key] = [$value->day, (int)$value->total];
        }

        $productcount = Product::count();
        $new_order    = Pembeli::where('status', '=', 'Unpaid')->count();
        $sukses_order = Pembeli::where('status', '=', 'Shipped')->count();

        return view('admin/home', compact('productcount', 'new_order', 'sukses_order'))->with('pembeli',json_encode($result));
    }

    public function month(){
        $pembeli = DB::table('pembeli')
        ->select(
            DB::raw("month(created_at) as month"),
            DB::raw("SUM(jml_brg) as total")) 
            ->orderBy("created_at")
            ->groupBy(DB::raw("month(created_at)"))
            ->get();
            
        $result[] = ['Month','Product'];
        foreach ($pembeli as $key => $value) {
        $result[++$key] = [$value->month, (int)$value->total];
        }

        $productcount = Product::count();
        $new_order    = Pembeli::where('status', '=', 'Unpaid')->count();
        $sukses_order = Pembeli::where('status', '=', 'Shipped')->count();

        return view('admin/home', compact('productcount', 'new_order', 'sukses_order'))->with('pembeli',json_encode($result));
    }

    public function year(){
        $pembeli = DB::table('pembeli')
        ->select(
            DB::raw("year(created_at) as year"),
            DB::raw("SUM(jml_brg) as total")) 
            ->orderBy("created_at")
            ->groupBy(DB::raw("year(created_at)"))
            ->get();
            
        $result[] = ['Year','Product'];
        foreach ($pembeli as $key => $value) {
        $result[++$key] = [$value->year, (int)$value->total];
        }

        $productcount = Product::count();
        $new_order    = Pembeli::where('status', '=', 'Unpaid')->count();
        $sukses_order = Pembeli::where('status', '=', 'Shipped')->count();

        return view('admin/home', compact('productcount', 'new_order', 'sukses_order'))->with('pembeli',json_encode($result));
    }
}
