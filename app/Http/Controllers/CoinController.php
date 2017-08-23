<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoinController extends Controller
{
    public function show(){
      return view ('coin');
    }
}
