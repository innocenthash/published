<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    public function index(Annonce $id){
        return view('Annonces.annonce_cherche',[
            'annonce'=> $id
        ]) ;
    }
}
