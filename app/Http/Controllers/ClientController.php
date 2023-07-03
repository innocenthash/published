<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
   public function inscription(){

    return view('Page_insc_connex.inscription');
   }

   public function connexion(){


    return view('Page_insc_connex.connexion');
   }

   public function pass_oublie(){

    return view('Page_insc_connex.pass_oublié');
   }
}
