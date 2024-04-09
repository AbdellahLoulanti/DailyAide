<?php

namespace App\Http\Controllers;

use App\Models\Partenaire;
use Illuminate\Http\Request;

class PartnerListingController extends Controller
{
    public function index(){
        $listings= Partenaire::latest()->filter(request(['tag','search']))->paginate(6);
        //dd(request('tag'));
        return view('partners-listing.index', ['listings' => $listings]);
    }
    public function show($id){
        $partner=Partenaire::find($id);
    if (!$partner) {
        abort(404);
    }
    return view('partners-listing.show', ['listing' => Partenaire::find($id)]);  
    }
}
