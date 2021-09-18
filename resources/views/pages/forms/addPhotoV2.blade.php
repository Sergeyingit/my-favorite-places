@extends('layout')
@section('title', 'Добавить фото места')
@include('menu')
@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="row" style="margin-top: 50px;">
            <h1 class="text-center">Добавить фото места</h1>


        </div>


        <div class="row text-center" style="margin-top: 50px;">
            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="control-label col-xs-12 col-sm-2 col-md-2 col-lg-2">Название фото</label>
                    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Название места">
                    </div>
                </div>
                <div class="form-group">
                    <label for="file" class="control-label col-xs-12 col-sm-2 col-md-2 col-lg-2">Фото</label>
                    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                        <input type="file" class="form-control" name="file" id="file" placeholder="Фото">
                    </div>
                </div>
                <div class="form-group">
                    <label for="type" class="control-label col-xs-12 col-sm-2 col-md-2 col-lg-2">Место</label>
                    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                        <select class="form-control" id="place" name="place">
                            <option value=""></option>
                            @foreach($places as $placesItem)
                                <option value="{{$placesItem->id}}">{{$placesItem->name}}</option>

                            @endforeach
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>



        </div>

        <div class="row text-center" style="margin-top: 50px;">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

@endsection
