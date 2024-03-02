<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public function index() {
        return view('listings.index', [
            "dataArray" => Listing::filter(request(["tag","search"]))->orderBy("id")
            ->paginate(4)
        ]);
    }

    public function show($id) {
        $listing = Listing::find($id);
        if($listing) {
            return view("listings.show", [
                "dataArray" => $listing
            ]);
        }else {
            abort("404");
        }
    }

    public function create() {
        return view("listings.create");
    }

    public function store(Request $request) {

        $formData = $request->validate([
            "title" => "required",
            "company" => ["required", Rule::unique("listings","company")],
            "location" => "required",
            "website" => "required",
            "email" => ["required", "email"],
            "tags" => "required",
            "description" => "required"
        ]);

        $tags = explode("," ,$formData["tags"]);
        $tags = array_filter($tags, function($tag) {
            return trim($tag) !== "";
        });
        $formData["tags"] = implode(",",$tags);
        $newListing = Listing::create($formData);
        
        return redirect("/listings/{$newListing->id}/{$newListing->title}")
                ->with("message", "Listing created!");
    }
}
