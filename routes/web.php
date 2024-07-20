<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client_Controller;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\DemandeServiceController;
use App\Http\Controllers\PartnerListingController;
use App\Http\Controllers\PartenaireController;
use Egulias\EmailValidator\Parser\Comment;


Route::get('/', function () {
    return view('index');
})->name('home');

// Route to show the signup form
Route::get('/client/signup', [Client_Controller::class, 'create'])->name('client.create');

// Route to handle form submission
Route::post('/client/signup', [Client_Controller::class, 'store'])->name('client.store');


Route::get('/client/login', [Client_Controller::class, 'showLoginForm'])->name('client.login');

Route::get('/client/edit', [Client_Controller::class,'edit'] )->name('client.edit-profile');
//Update Listing
Route::put('/client/edit', [Client_Controller::class,'update'] )->name('client.update-profile');

Route::post('/client/login', [Client_Controller::class, 'login'])->name('client.login.submit');

Route::post('/logout', [Client_Controller::class,'logout'] );

Route::get('/dashboard', [Client_Controller::class, 'dashboard'])->name('client.dashboard');

Route::get('/profil', [Client_Controller::class, 'showProfile'])->name('client.profile')->middleware('auth:client');

Route::get('/demande', [Client_Controller::class, 'demande'])->name('client.demande');


Route::post('/comments', [CommentaireController::class, 'store'])->name('comment.store');

Route::get('/formDemandeBricolage', [DemandeServiceController::class, 'formDemande'])->name('client.formDemande');

Route::post('/formDemandeBricolage', [DemandeServiceController::class, 'store'])->name('demande-service.store');

Route::get('/formDemandeAnimaux', [DemandeServiceController::class, 'formDemandeAnimaux'])->name('client.formDemandeAnimaux');

Route::post('/formDemandeAnimaux', [DemandeServiceController::class, 'store'])->name('demande-serviceAnimaux.store');

Route::get('/formDemandeMenage', [DemandeServiceController::class, 'formDemandeMenage'])->name('client.formDemandeMenage');

Route::post('/formDemandeMenage', [DemandeServiceController::class, 'store'])->name('demande-serviceMenage.store');

Route::get('/formDemandeCours', [DemandeServiceController::class, 'formDemandeCours'])->name('client.formDemandeCours');

Route::post('/formDemandeCours', [DemandeServiceController::class, 'store'])->name('demande-serviceCours.store');

Route::get('/MesDemandes', [DemandeServiceController::class, 'MesDemandes'])->name('client.MesDemandes');

Route::delete('/demandes/{id}', [DemandeServiceController::class, 'destroy'])->name('demande.destroy');

Route::get('/demandes/{demande}', [DemandeServiceController::class, 'show'])->name('demande.show');


//afficher la liste des prtenaires pour le selectionner

Route::get('/partners-listing', [PartnerListingController::class,'index'] )->name('select.partenaire');
Route::get('/partners-listing/{id}', [PartnerListingController::class,'show'] );
Route::post('/finalize-demande', [DemandeServiceController::class, 'finalizeDemande'])->name('finalize.demande');



//expirt
// Route to show the signup form
Route::get('/partenaire/signup', [PartenaireController::class, 'create'])->name('partenaire.create');

// Route to handle form submission
Route::post('/partenaire/signup', [PartenaireController::class, 'store'])->name('partenaire.store');

Route::get('/partenaire/login', [PartenaireController::class, 'showLoginForm'])->name('partenaire.login');

Route::post('/partenaire/login', [PartenaireController::class, 'login'])->name('partenaire.login.submit');

Route::get('/partenaire/dashboard', [PartenaireController::class, 'dashboard'])->name('partenaire.dashboard');

Route::get('/partenaire/profile', [PartenaireController::class, 'showProfile'])->name('partenaire.profile')->middleware('auth:Partenaire');

Route::get('/partenaire/edit', [PartenaireController::class,'edit'] )->name('partenaire.edit-profile');
//Update Listing
Route::put('/partenaire/edit', [PartenaireController::class,'update'] )->name('partenaire.update-profile');

Route::get('/partenaire/change-password', [PartenaireController::class,'editPasswordform'] )->name('partenaire.editPasswordform');

Route::post('/partenaire/change-password', [PartenaireController::class,'editPassword'] )->name('partenaire.editPassword');

Route::get('/partenaire/edit_categories', [PartenaireController::class,'edit_categories'] )->name('partenaire.edit_categories');

Route::post('/partenaire/edit_categories', [PartenaireController::class, 'editCategories'])->name('partenaire.editCategories');

Route::get('/partenaire/all-requests', [PartenaireController::class, 'allRequests'])->name('partenaire.all-requests');


Route::post('/partenaire/requests/{id}/accept', [PartenaireController::class, 'acceptRequest'])->name('partenaire.accept');

Route::post('/partenaire/requests/{id}/reject', [PartenaireController::class, 'rejectRequest'])->name('partenaire.reject');


Route::get('/appointment', [PartenaireController::class, 'appointment'])->name('partenaire.appointment');


Route::get('/partenaire/{id}/profile', [PartenaireController::class, 'showProfileforpart'])->name('partenaire.profilcl');

Route::post('/partenaire/appointments/{appointment}/complete', [PartenaireController::class, 'completeAppointment'])->name('partenaire.appointment.complete');

Route::get('/partenaire/historique', [PartenaireController::class, 'historique'])->name('partenaire.historique');

Route::post('/partenaire/commentaire', [PartenaireController::class, 'storeCommentaire'])->name('partenaire.commentaire.store');



