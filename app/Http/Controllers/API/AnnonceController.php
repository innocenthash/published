<?php

namespace App\Http\Controllers\API;

use App\Models\Annonce;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AnnonceController extends Controller
{
    public function index(){
         $totalAnnonce = Annonce::all() ;
         return response()->json([
            'annonces'=>$totalAnnonce ,
            'status'=>200
         ]) ;
    }
    public function store (Request $request){
        $this->validate($request,[
            'offres'=>'required',
            'tarif'=>'required',
            'lieu'=>'required',
            'description'=>'required',
            'images'=>'required'
        ]);

        $annonce = new Annonce();
$annonce->user_id =32;
$annonce->offres = $request->input('offres');
$annonce->tarif= $request->input('tarif');
$annonce->lieu = $request->input('lieu');
$annonce->description = $request->input('description');
$annonce->categorie_name = 'eeeee' ;
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

$annonce->images = 'vbbb' ;
$annonce->save() ;

return response()->json([
    'annonce'=>$annonce,
    'status'=>200,
    'message'=>'film inseré avec succès !'
]) ;
    }

   public function show($id)
    {
    $annonce = Annonce::find($id) ;
    return response()->json([
        'annonce'=>$annonce,
        'status'=>200,
        'message'=>'Film recuperé !'
    ]);
    }

}
