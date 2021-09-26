@extends('layout')
@section('title', trans('app.rating.ratingPlaces'))
@include('menu')
@section('content')
    <div class="container">
        <div class="row" style="margin-top: 50px;">
            <h1 class="text-center">@lang('app.rating.ratingPlaces')</h1>
            <div class="text-center" style="margin-top: 30px;">
                <ul class="list-unstyled">
                    @foreach($result as $resultItem)
                        <li style="padding: 10px;"><a href="{{route('place', $resultItem[0]->id)}}">{{$resultItem[0]->name}}</a> <span class="bg-info">#{{$resultItem[0]->type->name}}</span> <p>rating: {{$resultItem[1]}}</p></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
