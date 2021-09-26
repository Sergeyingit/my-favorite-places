@extends('layout')
@section('title', trans('app.menu.main'))

@section('content')
    <div class="container">
        <div class="row" style="margin-top: 200px;">
            <h1 class="text-center">My favorite places</h1>
            <div class="text-center" style="margin-top: 100px;">
                <a class="btn btn-info btn-lg" href="{{route('places')}}" role="button">@lang('app.places.myPlaces')</a>
            </div>
        </div>
    </div>
@endsection
