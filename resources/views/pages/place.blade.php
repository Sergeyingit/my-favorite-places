@extends('layout')
@section('title', $place->name)
@include('menu')
@section('content')
    <div class="container">
        <div class="row" style="margin-top: 50px;">
            <h1 class="text-center">{{$place->name}}</h1>
            <p class="text-center">#{{$place->type->name}}</p>

        </div>


        <div class="row text-center" style="margin-top: 50px;">
            @foreach($place->photo->sortDesc() as $photo)
            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3" style="padding-top: 10px"><img class="img-responsive" src="{{asset($photo->file)}}"> <p>{{$photo->name}}</p> </div>
            @endforeach


        </div>
        <div class="row text-right" style="margin-top: 50px;">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <a href="{{route('photoAdd', $place->id)}}" class="btn btn-primary">Добавить фото</a>
            </div>
        </div>
    </div>
@endsection
