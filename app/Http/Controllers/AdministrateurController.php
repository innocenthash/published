<?php

namespace App\Http\Controllers;

use Rules\Password;
use App\Models\Plan;
use App\Models\User;
use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

use Illuminate\Auth\Events\Registered;
use function Symfony\Component\String\b;
use Spatie\GoogleTagManager\GoogleTagManager;

class AdministrateurController extends Controller
{
   public function admin(){

    if(!Gate::allows('access-admin')){
        abort('403') ;
    } else{
    //     $users = User::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
    //    ->whereYear('created_at', date('Y'))
    //    ->groupBy(DB::raw("MONTH(created_at)"), DB::raw("MONTHNAME(created_at)"))
    //    ->pluck('count', 'month_name');

    //     $labels = $users->keys();
    //     $data = $users->values();

        return view('layouts.dashboard_admin');
    }

   }

   public function affiche_annonceurs(){

    $annonceurs  = User::all() ;

    return view('Admin.affiche_annonceurs')->with('annonceurs',$annonceurs);
   }

   public function register_admin(Request $request){
    $request->validate([
        'name' => ['required', 'string', 'max:255'],

        'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed'],
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
         'genre'=> 'administrateur',
         'admin'=>1,
        'statut'=>1,
        'password' => Hash::make($request->password),
    ]);





    return back();
   }

   public function supprimer_user($id){

        $user = User::find($id);

        $user->delete() ;

        return redirect('/annonceurs') ;
   }

   public function affiche_annonceur($annonceur){
    $annonceurs  = User::Where('genre',$annonceur)->get();
// dd($annonceurs);
    return view('Admin.affiche_annonceurs')->with('annonceurs',$annonceurs);
   }

   public function affiche_client($client){
    $annonceurs  = User::where('genre',$client)->get() ;

    return view('Admin.affiche_annonceurs')->with('annonceurs',$annonceurs);
   }

   public function annonces_tous_annonceurs(){

    $annonces = Annonce::orderBy('created_at',"desc")->get();
    return view('admin.annonces_tous_annonceurs')->with('annonces',$annonces);
   }

   public function supprimer_annonces_admin($id){
    $annonces = Annonce::find($id);
    $annonces->delete() ;
   return redirect('/annonces_tous_annonceurs') ;

   }

   public function activer_annonces($id){
            $annonces = Annonce::find($id);
            $annonces->statut=1 ;
            $annonces->update();
            return redirect('/annonces_tous_annonceurs') ;
   }

   public function desactiver_annonces($id){
    $annonces = Annonce::find($id);
    $annonces->statut=0 ;
    $annonces->update();
    return redirect('/annonces_tous_annonceurs') ;
   }

   public function save_plan(Request $request){

    $request->validate([
        'nom' => ['required', 'string', 'max:25'],
        'slug' => ['required', 'string', 'max:25'],
        'plan' => ['required', 'string', 'max:255'],
        'tarif'=> ['required'] ,

    ]);

    $listes = $request->input('liste');
    // foreach ($listes as $listeIndex => $nouveauxElements) {

    //     dd($nouveauxElements) ;
    // }

    $plan  = new Plan() ;
    $plan->name = $request->input('nom') ;
    $plan->slug = $request->input('slug') ;
    $plan->stripe_plan = $request->input('plan') ;
    $plan->price = $request->input('tarif') ;
    $plan->data = $listes;

    $plan->save();

    return redirect('/create_plan') ;


   }

   public function users(){
    GoogleTagManager::set('pageType', 'productDetail');

    return view('GoogleTag.index');
   }
}
