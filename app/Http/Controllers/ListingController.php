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
            ->paginate(6)
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

        if($request->hasFile("logo")) {
            if($request->file("logo")->getSize() < 2004800 && substr($request->file("logo")->getMimeType(),0,5) == "image") {
                $formData["logo"] = $request->file("logo")->store("logos","public");
            }
        }

        $tags = explode("," ,$formData["tags"]);
        $tags = array_filter($tags, function($tag) {
            return trim($tag) !== "";
        });
        $formData["tags"] = implode(",",$tags);
        $newListing = Listing::create($formData);
        
        return redirect("/listings/{$newListing->id}/{$newListing->title}")
                ->with("message", "Listing created!");
    }

    public function edit($id) {
        $listing = Listing::find($id);
        return view("listings.edit", ["listing"=>$listing]);
    }

    public function update(Request $request, Listing $listing) {
        $formData = $request->validate([
            "title" => "required",
            "company" => "required",
            "location" => "required",
            "website" => "required",
            "email" => ["required", "email"],
            "tags" => "required",
            "description" => "required"
        ]);

        if($request->hasFile("logo")) {
            if($request->file("logo")->getSize() < 2004800 && substr($request->file("logo")->getMimeType(),0,5) == "image") {
                unlink("storage/$listing->logo");
                $formData["logo"] = $request->file("logo")->store("logos","public");
            }
        }

        $tags = explode("," ,$formData["tags"]);
        $tags = array_filter($tags, function($tag) {
            return trim($tag) !== "";
        });
        $formData["tags"] = implode(",",$tags);

        $listing->update($formData);
        
        return redirect("/listings/{$listing->id}/{$listing->title}")
            ->with("message", "Listing updated!");
    }

    public function destroy(Listing $listing) {
        if(!is_null($listing->logo)) {
            unlink("storage/$listing->logo");
        }
        $listing->delete();
        return redirect("/")->with("message", "Listing deleted!");
    }
}
