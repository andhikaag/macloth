<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facedes\Cart;

use App\Product;
use App\Slide;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Redirect;
use Session;
use hash;

class SlideController extends Controller
{
    public function index(){
        $slide = Slide::all();
        return view('slideshow.slide')->with('slide', $slide);
    }

    public function add(Request $request){

    }
}
