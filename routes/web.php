<?php

use App\Http\Livewire\Categorie;
use App\Http\Livewire\LiveCaregorie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnnonceurController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ClientPageController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\AdministrateurController;
use App\Http\Controllers\BoutiqueController;
use App\Http\Controllers\GraphiqueController;
use App\Http\Controllers\QrCodeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// page first debut
// Route::get('/',[ClientController::class,'inscription']);
Route::get('/inscription',[ClientController::class,'inscription']);
Route::get('/connexion',[ClientController::class,'connexion']);
Route::get('/pass_oublie',[ClientController::class,'pass_oublie']) ;
// fin
// page de l'annoceurs debut
Route::get('/Ajouter_Annonces',[AnnonceurController::class,'Ajouter_Annonces']);
Route::post('/save_annonce',[AnnonceurController::class,'save_annonce']);
Route::get('/affiche_annonces_client/{id}',[AnnonceurController::class,'affiche_annonces_client']) ;
Route::get('/payement_annonce/{id}',[AnnonceurController::class,'payement_annonce']);
Route::get('/valider_commande/{id}',[AnnonceurController::class,'valider_commande']);
Route::get('/editer_annonce/{id}',[AnnonceurController::class,'editer_annonce']);


Route::get('/conversation',[ConversationController::class,'conversation']) ;

Route::get('/affiche_message/{conversation}',[ConversationController::class,'messages']) ;

Route::get('/boutique',[BoutiqueController::class,'boutique']);

// page de l'annonceurs fin

// page de client debut
Route::get('/',[ClientPageController::class,'accueil_client']) ;
Route::get('/Accueil_client',[ClientPageController::class,'accueil_client'])->name('commande.index') ;
Route::get('/images_cibles/{id}',[ClientPageController::class,'images_cibles']) ;
Route::get('/tableau_de_bord_client',[ClientPageController::class,'tableau_de_bord_client']);
Route::get('/commande_annonce/{annonce_id}',[ClientPageController::class,'commande_annonce']);


// recherche


Route::get('/annonces/{id}',[AnnonceController::class,'index'])->name('annonces.voir');


// fin

Route::group(['middleware'=>['auth','commande']],

function(){
    Route::post('/commande_envoie/{commande}',[ClientPageController::class,'commande_envoie']) ;
}

);

Route::get('/generate_qrcode',[QrCodeController::class,'generate_qrcode']) ;
Route::get('/qrcode_formulaire',[QrCodeController::class,'qrcode_formulaire'])->name('qrcode_formulaire.qrcode_formulaire');
Route::post('/save_qrcode',[QrCodeController::class,'save_qrcode']) ;

Route::get('googletag',[AdministrateurController::class,'users']) ;

//  fin

// Route::get('/', function () {
//     return view('welcome');
// });

// admin

Route::get('/create_plan',[PlanController::class,'formulaire_plan']) ;

Route::get('/create_categorie',[CategorieController::class,'formulaire_categorie']) ;
Route::post('/save_categorie',[CategorieController::class,'save_categorie']) ;
Route::get('/categorie_show/{show}',[CategorieController::class,'categorie_show']) ;
Route::get('/affiche_categorie',[CategorieController::class,'affiche_categorie'])->name('affiche_categorie.affiche_categorie') ;
Route::get('/edit_categorie/{id}',[CategorieController::class,'edit_categorie']);
Route::put('/modifier_categorie/{id}',[CategorieController::class,'modifier_categorie']) ;
Route::get('/supprimer_categorie/{id}',[CategorieController::class,'supprimer_categorie']) ;
Route::get('/affiche_graphique_users',[GraphiqueController::class,'affiche_graphique_users']) ;
Route::get('/affiche_graphique_annonce',[GraphiqueController::class,'affiche_graphique_annonce']) ;
// avec livewire

Route::get('/categorie',[Categorie::class]);
Route::post('/live-caregorie',[LiveCaregorie::class,'loadPosts']);

// admin


 Route::get('/admin',[AdministrateurController::class,'admin']);
 Route::get('/annonceurs',[AdministrateurController::class,'affiche_annonceurs']);
 Route::post('/register_admin',[AdministrateurController::class,'register_admin']);
 Route::get('supprimer_user/{id}',[AdministrateurController::class,'supprimer_user']);
 Route::get('/affiche_annonceur/{annonceur}',[AdministrateurController::class,'affiche_annonceur']) ;
 Route::get('/affiche_client/{client}',[AdministrateurController::class,'affiche_client']) ;
 Route::get('/annonces_tous_annonceurs',[AdministrateurController::class,'annonces_tous_annonceurs']);
 Route::get('/supprimer_annonces_admin/{id}',[AdministrateurController::class,'supprimer_annonces_admin']);
 Route::get('/activer_annonces/{id}',[AdministrateurController::class,'activer_annonces']);
 Route::get('/desactiver_annonces/{id}',[AdministrateurController::class,'desactiver_annonces']);
 Route::post('/save_plan',[AdministrateurController::class,'save_plan']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/Accueil_client', function () {
//     return view('page_accueil.accueil_client');
// })->middleware(['auth', 'verified'])->name('Accueil_client');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('plans', [PlanController::class, 'index']);
    Route::get('plans/{plan}/{id}', [PlanController::class, 'show'])->name("plans.show");
    Route::post('subscription', [PlanController::class, 'subscription'])->name("subscription.create");
    Route::get('recup_date/{id}', [PlanController::class, 'recup_date']) ;
});

require __DIR__.'/auth.php';



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


