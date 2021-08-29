@extends('layout')
@section('title', $place->name)
@section('content')
    <div class="container">
        <div class="row" style="margin-top: 50px;">
            <h1 class="text-center">{{$place->name}}</h1>
            <p class="text-center">#{{$place->type->name}}</p>

        </div>


        <div class="row text-center" style="margin-top: 50px;">
            @foreach($place->photo as $photo)
            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3" style="padding-top: 10px"><img class="img-responsive" src="{{asset($photo->file)}}"> </div>
            @endforeach


        </div>
    </div>
@endsection
