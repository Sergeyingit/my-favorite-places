@extends('layout')
@section('title', $place->name)
@include('menu')
@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="row" style="margin-top: 50px;">
            <h1 class="text-center">{{$place->name}}</h1>
            <p class="text-center">#{{$place->type->name}}</p>

        </div>

        <div class="row text-left" style="margin-top: 50px;">
            <ul style="list-style: none;">
                <li>@lang('app.rating.ratingPhoto')(like/dislike}: {{$likesPhoto}}/{{$dislikesPhoto}}</li>
                <li>@lang('app.rating.ratingPlace')(like/dislike}: {{$likes}}/{{$dislikes}}</li>
            </ul>


        </div>
        <div class="row text-center" style="margin-top: 50px;">
            @foreach($place->photo->sortDesc() as $photo)
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3" style="padding-top: 10px"><img class="img-responsive" src="{{asset($photo->file)}}"> <p>{{$photo->name}}</p> <a href="{{route('likePhoto', $photo->id)}}" class="btn btn-success btn-xs">Like</a> <a href="{{route('dislikePhoto', $photo->id)}}" class="btn btn-danger btn-xs">Dislike</a><div><a href="{{route('downloadPhoto', $photo->id)}}">@lang('app.buttons.download')</a></div> <div><form action="{{route('photos.destroy', $photo->id)}}" method="post">@csrf @method('DELETE')<button type="submit">@lang('app.buttons.delete')</button></form></div> </div>
            @endforeach


        </div>

        <div class="row text-center" style="margin-top: 50px;">
            <a href="{{route('likePlace', $place->id)}}" class="btn btn-success">Like</a> <a href="{{route('dislikePlace', $place->id)}}" class="btn btn-danger">Dislike</a>
        </div>
        <div class="row text-right" style="margin-top: 50px;">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <a href="{{route('photoAdd', $place->id)}}" class="btn btn-primary">@lang('app.buttons.addPhoto')</a>
            </div>
        </div>
    </div>
@endsection
