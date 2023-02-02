<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DemoController extends Controller
{

    public function homeMain(){
        return view('frontend.index');
    } //End
   public function index(){
    return view('about');
   }//End
   public function contact(){
    return view('contact');
   }//End
}
