<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Annonce;
use App\Models\Message;
use App\Models\Commande;
use App\Models\Categorie;
use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnonceurController extends Controller
{
    public function Ajouter_Annonces(){

        $categorie = Categorie::All()->pluck('categorie_name','categorie_name') ;

        return view('Annonces.Ajouter_Annonces')->with('categorie',$categorie);
    }

    public function save_annonce(Request $request){

        $this->validate($request,[
            'offres'=>'required',
            'tarif'=>'required',
            'lieu'=>'required',
            'description'=>'required',
            'images'=>'required' ,
            "name_categorie"=>'required'
        ]);

        $annonce = new Annonce();
$annonce->user_id = Auth::user()->id;
$annonce->offres = $request->input('offres');
$annonce->tarif= $request->input('tarif');
$annonce->lieu = $request->input('lieu');
$annonce->categorie_name = $request->input('name_categorie') ;
$annonce->description = $request->input('description');



$images= $request->file('images');

// dd($images);

$imageNames=[];
$imageStore=[];
foreach ($images as $image) {

    $fileNameWithExt=$image->getClientOriginalName();

    $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);

    $ext = $image->getClientOriginalExtension() ;


    $fileNameToStore= $fileName.'_'.time().'.'.$ext;

        # code...
        $path = $image->storeAs('public/annonces_images',$fileNameToStore);

        $imageNames[]=$path ;
        $imageStore[]=$fileNameToStore;
    //  $string = implode(',', $fileNameToStore);



}
//  dd( $imageStore);

$annonce->images = json_encode($imageStore);
// $imageNames =  $fileNameToStore ;

// dd($imageNames);





 $annonce->save() ;





        // $fileNameWithExts = $request->file('images');
        // foreach ($fileNameWithExts as $$fileNameWithExt) {
        //        dd($fileNameWithExt);
        // }


        return back();

    }

    public function affiche_annonces_client($id){
        $annonces= Annonce::where('user_id',$id)->get();

        return view('Annonces.affiche_annonce_client')->with('annonces',$annonces) ;
    }

    public function payement_annonce($id){

$annonces = Annonce::where('id',$id)->get() ;
$id="" ;
foreach ($annonces as $annonce) {
    $id=$annonce->id;
}

        $plans = Plan::get();

        return view("plan.plans", compact("plans","id"));
    }

    public function valider_commande($id){

        $commandes = Commande::where('id',$id)->get();
foreach ($commandes as $commande) {
   $to=$commande->user->id;
   $annonce_id = $commande->annonce->id;
}

//  dd($annonce_id);

        $commande = Commande::find($id) ;
        $commande->validation = 1 ;
        $commande->update() ;


        $conversation  = new Conversation() ;
        $conversation->from = Auth::user()->id;
        $conversation->to = $to;
        $conversation->annonce_id = $annonce_id ;
        $conversation->save() ;

        $message = new Message() ;

        $message->user_id = Auth::user()->id;
        $message->conversation_id = $conversation->id ;
        $message->contenue = 'Bonjour ! Bienvenue ';
        $message->save() ;
        return back() ;
       }

       public function editer_annonce($id){
        $annonce = Annonce::find($id);
        $categorie = Categorie::All()->pluck('categorie_name','categorie_name') ;
        return view('Annonces.editer_annonce')->with('categorie',$categorie)->with('annonce',$annonce);
       }

}
