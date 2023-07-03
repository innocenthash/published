<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Stripe\Stripe;
use App\Models\Plan;
use App\Models\User;
use App\Models\Annonce;
use Mockery\Matcher\Any;
use Illuminate\Http\Request;
use Laravel\Cashier\Subscription;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::get();






   return view("plan.plans", compact("plans"));


    }



    /**
     * Write code on Method
     *
     * @return response()
     */
    public function show(Plan $plan, Request $request  , Annonce $id)
    {


        $user = Auth::user(); // Récupère l'utilisateur actuellement authentifié

        if ($user) {
         $intent = $user->createSetupIntent();
            // Continuez à utiliser l'intention de configuration de paiement ici
        } else {
            // Gérez le cas où aucun utilisateur n'est authentifié
        }

        // $subscription = auth()->user()->subscription;

        // if ($subscription) {
        //     // Configurez la clé d'API Stripe
        //     Stripe::setApiKey(config('services.stripe.secret'));

        //     // Obtenez l'abonnement Stripe à l'aide de l'identifiant d'abonnement
        //     $stripeSubscription = \Stripe\Subscription::retrieve($subscription->stripe_id);

        //     // Récupérez la prochaine date de facturation à partir de l'abonnement Stripe
        //     $nextBillingDate = Carbon::createFromTimestamp($stripeSubscription->current_period_end);

        //     // Formatez la date selon vos besoins
        //     $formattedDate = $nextBillingDate->format('Y-m-d');

        //     // Affichez la date de facturation
        //     echo "La prochaine date de facturation est : " . $formattedDate;
        // } else {
        //     echo "Aucun abonnement trouvé pour cet utilisateur.";
        // }

       return view("plan.subscription", compact("plan", "intent" ,"id"));
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function subscription(Request $request)
    {
      $annonce = Annonce::find($request->input('pay_id_annonce')) ;
      $annonce->statut = 1 ;
      $annonce->update() ;

      $plan = Plan::find($request->plan);

        $subscription = $request->user()->newSubscription($request->plan, $plan->stripe_plan)
                       ->trialUntil(Carbon::now()->addDays(10))
                        ->create($request->token);

                        $subscription->update([
                            'annonce_id' => $request->input('pay_id_annonce') // Remplacez $annonceId par la valeur souhaitée pour la colonne annonce_id
                        ]);

//                         $subscriptionEndDate = $subscription->ended();
//                         // $trialEndDate = $subscription->trialEndsAt();

//                         $subscriptionModel = new Subscription();
//                         $subscriptionModel->ends_at = $subscriptionEndDate;
//                         // $subscriptionModel->trial_end_at = $trialEndDate;
//                         $subscriptionModel->user_id = $request->user()->id;
//                         $subscriptionModel->save();

//                         $currentDate = Carbon::now();

// // if ($currentDate->lte($trialEndDate)) {
// //     echo "L'utilisateur est en période d'essai";
// // } else {
// //     echo "La période d'essai de l'utilisateur est terminée";
// // }

// if ($currentDate->gt($subscriptionEndDate)) {
//     echo "L'abonnement de l'utilisateur est expiré";
// } else {
//     echo "L'abonnement de l'utilisateur est toujours actif";
// }

        return view("plan.subscription_success");
    }

    public function recup_date($id){

        $subscription= Subscription::where('user_id',Auth::user()->id)->where('annonce_id',$id)->first();
// Convertir la date en objet Carbon pour pouvoir la manipuler
//         $date = Carbon::parse($subscription->trial_ends_at);
//         // dd($date) ;
//         // Obtenir la date et l'heure actuelles
// $dateActuelle = Carbon::now();

// // Comparer les deux dates
// if ($date->greaterThan($dateActuelle)) {
//     // Décrémenter la date jusqu'à la date actuelle avec l'heure
//     while ($date->greaterThan($dateActuelle)) {
//         $date->subDay(); // ou $date->subHour(); pour une précision à l'heure
//     }
// }

// $dateFormatee = $date->format('Y-m-d H:i:s');

$aujourdHui = now();

$dateFormatted = Carbon::parse($subscription->trial_ends_at );
// $dateDb = // récupérez la date depuis la base de données, par exemple, avec un modèle Eloquent

$diff=$aujourdHui->diff($dateFormatted);



// Utiliser la date décrémentée selon vos besoins

        return view('Date.date_fin_essaie')->with('diff', $diff);




    }

    public function formulaire_plan()
    {


        return view('plan.formulaire_plan') ;
    }
}
