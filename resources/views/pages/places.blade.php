@extends('layout')
@section('title', 'Мои места')
@section('content')
    <div class="container">
        <div class="row" style="margin-top: 50px;">
            <h1 class="text-center">Мои места</h1>
            <div class="text-center" style="margin-top: 30px;">
                <ul class="list-unstyled">
                    @foreach($places as $place)
                        <li style="padding: 10px;"><a href="/places/{{$place->id}}">{{$place->name}}</a> <span class="bg-info">#{{$place->type->name}}</span></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
