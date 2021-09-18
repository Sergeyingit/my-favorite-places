<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Type;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\App;
use App\Models\Place;
use Illuminate\Support\Facades\Storage;


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

    public function showFormAddPhoto()
    {

        return view('pages.forms.addPhoto');
    }

    public function addPhoto(Request $request,$id)
    {

        $this->validate($request, [
            'name' => 'required',
            'file' => 'required'
        ], [
            'name.required' => 'Поле :attribute не заполнено',
            'file.required' => 'Поле :attribute не заполнено'

        ]);


        $photo = $request->file('file')->store('public/new');
        $photoPath = Storage::url($photo);

        $photo = Photo::create([
            'name' => $request->input('name'),
            'file' => $photoPath,
            'place_id' => $id
        ]);


        return redirect()->route('place', $id);
    }

    public function showFormAddPhotoV2()
    {
        $places = Place::all();
        if (!$places) {
            return redirect()->route('mainPage');
        }
        return view('pages.forms.addPhotoV2', compact('places'));
    }

    public function addPhotoV2(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'file' => 'required',
            'place' => 'required',
        ], [
            'name.required' => 'Поле :attribute не заполнено',
            'file.required' => 'Поле :attribute не заполнено',
            'place.required' => 'Поле :attribute не заполнено',

        ]);


        $photo = $request->file('file')->store('public/new');
        $photoPath = Storage::url($photo);

        $photo = Photo::create([
            'name' => $request->input('name'),
            'file' => $photoPath,
            'place_id' => $request->input('place'),
        ]);


        return redirect()->route('place', $request->input('place'));
    }
}
