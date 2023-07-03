<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraphiqueController extends Controller
{
   public function affiche_graphique_users(){
    $users = User::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
    ->whereYear('created_at', date('Y'))
    ->groupBy(DB::raw("MONTH(created_at)"), DB::raw("MONTHNAME(created_at)"))
    ->pluck('count', 'month_name');

    // $users = User::selectRaw('COUNT(*) as count, HOUR(created_at) as hour')
    // // ->whereIn('user_type', ['user', 'advertiser', 'admin'])
    // ->whereDate('created_at', '=', date('Y-m-d'))
    // ->groupBy('hour')
    // ->get()
    // ->pluck('count', 'hour');

    // $users = User::selectRaw('COUNT(*) as count, DATE(created_at) as date')
    // // ->whereIn('user_type', ['user', 'advertiser', 'admin'])
    // ->whereDate('created_at', '=', date('Y-m-d'))
    // ->groupBy('date')
    // ->get()
    // ->pluck('count', 'date');


     $labels = $users->keys();
     $data = $users->values();

     $annonce = Annonce::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
     ->whereYear('created_at', date('Y'))
     ->groupBy(DB::raw("MONTH(created_at)"), DB::raw("MONTHNAME(created_at)"))
     ->pluck('count', 'month_name');

      $labels_annonce = $annonce->keys();
      $data_annonce = $annonce->values();

     return view('graphique.graphique',compact('labels', 'data')) ;
   }

   public function affiche_graphique_annonce(){
    $users = Annonce::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
     ->whereYear('created_at', date('Y'))
     ->groupBy(DB::raw("MONTH(created_at)"), DB::raw("MONTHNAME(created_at)"))
     ->pluck('count', 'month_name');

     $labels = $users->keys();
     $data = $users->values();


     return view('graphique.graphique',compact('labels', 'data')) ;
   }
}
