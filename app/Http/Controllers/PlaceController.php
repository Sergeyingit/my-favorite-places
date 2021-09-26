<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Rating;
use App\Models\Type;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\App;
use App\Models\Place;
use Illuminate\Support\Facades\App;
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
//        $photo = Place::find($id)->photo;
//        dd($photo);

        $likes = Place::find(1)->ratings->where('type',true)->count();
        $dislikes = Place::find(1)->ratings->where('type',false)->count();
        $likesPhotoId = Rating::where('ratingtable_type', Photo::class)->where('type',true)->get();
        $dislikesPhotoId = Rating::where('ratingtable_type', Photo::class)->where('type',false)->get();
        $likesPhoto = 0;
        $dislikesPhoto = 0;
        foreach ($likesPhotoId as $item) {
            $isPhoto = Photo::where('place_id', $id)->where('id',$item->ratingtable_id)->count();
            if($isPhoto) {
                $likesPhoto ++;
            }

        }

        foreach ($dislikesPhotoId as $item) {
            $isPhoto = Photo::where('place_id', $id)->where('id',$item->ratingtable_id)->count();
            if($isPhoto) {
                $dislikesPhoto ++;
            }

        }
//        dd(Place::find($id)->getRating());

        return view('pages.place', compact(['place', 'likes', 'dislikes', 'likesPhoto', 'dislikesPhoto']));
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

    public function addLikePhoto($id)
    {
        Rating::create([
            'type' => true,
            'ratingtable_id' => $id,
            'ratingtable_type' => Photo::class
        ]);
    }

    public function addLikePlace($id)
    {
        Rating::create([
            'type' => true,
            'ratingtable_id' => $id,
            'ratingtable_type' => Place::class
        ]);
    }

    public function addDislikePhoto($id)
    {
        Rating::create([
            'type' => false,
            'ratingtable_id' => $id,
            'ratingtable_type' => Photo::class
        ]);
    }

    public function addDislikePlace($id)
    {
        Rating::create([
            'type' => false,
            'ratingtable_id' => $id,
            'ratingtable_type' => Place::class
        ]);
    }

    public function getPlacesRating()
    {
        $places = Place::all();
        $result = [];
        foreach ($places as $place) {
            $placeRating = $place->getRating();
            $placePhotoArr = $place->photo;
            $placePhotoRating = 0;
//            dd($placePhotoArr);
            foreach($placePhotoArr as $photo) {
                $placeRating += $photo->getRating();
            }
            $result[] = [$place , $placeRating];
        }

//        dd($result);
        return view('pages.rating', compact('result'));
    }

    public function downloadPhoto($id)
    {
        $photoPath = Photo::find($id)->file;
//        dd($photo->file);
        return response()->download($photoPath);
    }

    public function changeLocale($locale)
    {
        if(in_array($locale, ['en','ru'])) {
            App::setLocale($locale);
        }
    }
}
