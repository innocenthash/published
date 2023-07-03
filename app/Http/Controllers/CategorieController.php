<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function formulaire_categorie(){

        return view('caterogie.formulaire_categorie') ;
    }
public function save_categorie(Request $request){
   $categorie = new Categorie() ;
   $categorie->categorie_name = $request->input('categorie') ;
   $categorie->save() ;
   return redirect('/create_categorie')->with('status','categorie enregistré avec succès !') ;
}

public function categorie_show($show){
    $categories = Categorie::all() ;
     $annonces  = Annonce::where('categorie_name',$show)->where('statut',1)->orderBy('created_at',"desc")->get() ;
   return view('page_accueil.accueil_client')->with("annonces",$annonces)->with('categories',$categories);  ;
}

public function affiche_categorie(){

    $categories = Categorie::all() ;
    return view('caterogie.affiche_categorie')->with('categories',$categories) ;
}
public function edit_categorie($id){
         $categorie = Categorie::find($id) ;
    return view('caterogie.edit_categorie')->with('categorie',$categorie) ;
}

public function modifier_categorie($id,Request $request){
    $this->validate($request,[
        'categorie'=>'required'
    ]);
    $categorie = Categorie::find($id) ;
    $categorie->categorie_name = $request->input('categorie');
    $categorie->update();
    return redirect('/affiche_categorie')->with('status','categorie modifié avec succès !') ;
}

public function supprimer_categorie($id){
    $categorie = Categorie::find($id) ;
    $categorie->delete() ;
     return redirect('/affiche_categorie') ;
}


}
