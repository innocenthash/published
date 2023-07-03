<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoutiqueController extends Controller
{
   public function boutique(){

    return view('boutique.boutique');
   }
}
