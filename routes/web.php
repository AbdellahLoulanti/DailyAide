<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client_Controller;
use App\Http\Controllers\DemandeServiceController;
use App\Http\Controllers\PartnerListingController;

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













