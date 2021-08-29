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
//        $places = Place::find(2)->type;
//        dd($places);
        return view('pages.places', compact('places'));
    }
}
