<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\App;
use App\Models\Place;


class PlaceController extends Controller
{
    public function getAllPlaces()
    {
        $places = Place::all();
//
//        dd($places);
        return view('pages.places', compact('places'));
    }

    public function getPlace($id)
    {
        $place = Place::find($id);
//
//        dd($place->photo->name);
        return view('pages.place', compact('place'));
    }
}
