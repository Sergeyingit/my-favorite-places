<?php

namespace App\Http\Controllers;

use App\Models\Type;
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

    public function showFormCreatePlace()
    {
        $type = Type::all();
//
//        dd($type);
        return view('pages.forms.createPlace', compact('type'));
    }

    public function createPlace(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:places',
            'type' => 'required'
        ], [
            'name.required' => 'Поле :attribute не заполнено',
            'name.unique' => 'Место с таким названием уже существует',
            'type.required' => 'Поле :attribute не заполнено'

        ]);

//
        $name = $request->input('name');
        $type = $request->input('type');


        $place = Place::create([
            'name' => $name,
            'type_id' => $type
        ]);
        return redirect('/places');
    }
}
