<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Transaksi;
use App\Pembeli;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Excel;
use PDF;

class ReportController extends Controller
{
    public function index(){
        $pembeli = Pembeli::where('status', '=', 'Shipped')->orderBy('id')->get();

        return view('admin.reports.index', compact('pembeli'));
    }

    public function setPeriode(){
        $fromDate = Input::get('from');
        $toDate = Input::get('to');
        $date_range = [$fromDate . ' 00:00:00', $toDate . ' 23:59:59'];

        $pembeli = Pembeli::where('status', '=', 'Shipped')->whereBetween('created_at', $date_range)
        ->get();
        
        $sumharga = Pembeli::where('status', '=', 'Shipped')->whereBetween('created_at', $date_range)->sum('total');
        $sumjml = Pembeli::where('status', '=', 'Shipped')->whereBetween('created_at', $date_range)->sum('jml_brg');

        //return view('admin.reports.save', compact('pembeli', 'fromDate', 'toDate', 'sumharga', 'sumjml'));
        $pdf = PDF::loadView('admin.reports.save', compact('pembeli', 'fromDate', 'toDate', 'sumharga', 'sumjml'));
        $pdf->save(storage_path().'_filename.pdf');
        return $pdf->download('customers.pdf');
    }

    public function detail(){
        $formid = Input::get('formid');
        $transaksi = Transaksi::whereHas('product', function($q) {
            $formid = Input::get('formid');
            $q->where('formid', '=', $formid);
        })->get();
    
        $pembeli = Pembeli::where('formid', '=', $formid)->first();
            
    
        return view('admin.reports.detail', compact('pembeli', 'transaksi'));
    }

    //public function export(){
        // Fetch all customers from database
    //$data = Pembeli::where('status', '=', 'Shipped')->orderBy('id')->get();

    // Send data to the view using loadView function of PDF facade
   // $pdf = PDF::loadView('admin.reports.save', compact('data'));

    // If you want to store the generated pdf to the server then you can use the store function
   //$pdf->save(storage_path().'_filename.pdf');

    // Finally, you can download the file using download function
    //return $pdf->download('customers.pdf');
   // return view('admin.reports.save', compact('data'));
    //}
}
