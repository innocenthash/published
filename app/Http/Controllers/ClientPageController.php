<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Annonce;
use App\Models\Commande;
use App\Models\Categorie;
use App\Models\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientPageController extends Controller
{
   public function affiche_annonces(){


   }

   public function accueil_client(){

    $categories = Categorie::all() ;
    view()->share('isLoading', true); // Indique que les données sont en cours de chargement
$annonces = Annonce::where('statut',1)->orderBy('created_at',"desc")->get();
view()->share('isLoading', false); // Indique que le chargement des données est terminé
// dd($annonces) ;
    return view('page_accueil.accueil_client')->with("annonces",$annonces)->with('categories',$categories);
   }

   public function images_cibles($id){
    $annonces = Annonce::Where('id',$id)->get();
// dd($images) ;

     return view('feuilletage.feuilletage')->with('annonces',$annonces) ;
   }

   public function tableau_de_bord_client(){

//  $moi = User::find(Auth::user()->id);

$commandes = Commande::get() ;

// dd($commandes) ;
// foreach ($commandes as $commande ) {
//         $p=$commande->annonce_id;

//         $annonces = Annonce::where('id',$p)->get() ;
//         foreach ($annonces as $annonce) {
//            $a=$annonce->offres ;

//         }

// }






// if(Auth::user()->id==$p){
//    dd('ok') ;
// } else{
//     dd('no') ;
// }



  return view('client.tableau_de_bord_client')->with('commandes',$commandes );

 }

   public function commande_annonce($annonce_id){


    return view('commande.renseigne')->with('annonce_id',$annonce_id) ;
    dd('annonce : '.$annonce_id);
   }

   public function commande_envoie(Request $request , Annonce $annonce){

    // $f = User::find(Auth::user()->id);


    $commande = new Commande();

    $commande->user_id=Auth::user()->id;
    $commande->annonce_id=$request->input('annonce_id');
    $commande->save() ;

    // dd($commande->id) ;

    $question = new Questions() ;
    $question->commande_id = $commande->id ;
    $question->question = $request->input('select');
    $question->save() ;


    return redirect('/tableau_de_bord_client')->with('status','votre question a été envoyé avec succès !') ;

    // $valeur = $request->input('select');
    // $annonce_id = $request->input('annonce_id');
    //       dd($valeur .' / '. $annonce_id );
   }
}
