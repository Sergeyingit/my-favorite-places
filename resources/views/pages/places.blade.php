@extends('layout')
@section('title', trans('app.places.myPlaces'))
@include('menu')
@section('content')
    <div class="container">
        <div class="row" style="margin-top: 50px;">
            <h1 class="text-center">@lang('app.places.myPlaces')</h1>
            <div class="text-center" style="margin-top: 30px;">
                <ul class="list-unstyled">
                    @foreach($places as $place)
                        <li style="padding: 10px;"><a href="{{route('place', $place->id)}}">{{$place->name}}</a> <span class="bg-info">#{{$place->type->name}}</span></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
