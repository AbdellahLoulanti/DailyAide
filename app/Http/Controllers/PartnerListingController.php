<?php

namespace App\Http\Controllers;

use App\Models\Partenaire;
use App\Models\Commentaire; // Ensure you have this model
use Illuminate\Http\Request;

class PartnerListingController extends Controller
{
    public function index(){
        $listings = Partenaire::latest()->filter(request(['tag', 'search']))->paginate(6);
        return view('partners-listing.index', compact('listings'));
    }

    public function show($id){
        $partner = Partenaire::find($id);
        if (!$partner) {
            abort(404);
        }

        // Fetch comments where sendBy is 'client' and id_part matches the partner's id
        $comments = Commentaire::with('client')
                               ->where('id_part', $id)
                               ->where('sendby', 'client')
                               ->get();

        return view('partners-listing.show', [
            'listing' => $partner,
            'comments' => $comments // Pass the comments to the view
        ]);
    }
}
