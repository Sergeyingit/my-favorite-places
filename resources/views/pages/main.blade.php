@extends('layout')
@section('title', 'Главная страница')
@section('content')
    <div class="container">
        <div class="row" style="margin-top: 200px;">
            <h1 class="text-center">My favorite places</h1>
            <div class="text-center" style="margin-top: 100px;">
                <a class="btn btn-info btn-lg" href="/places" role="button">Мои места</a>
            </div>
        </div>
    </div>
@endsection
