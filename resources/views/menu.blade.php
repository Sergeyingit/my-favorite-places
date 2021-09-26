<header class="container" style="padding-top: 20px;">
    <style>
        .menu li .active {
            border-bottom: 1px solid blue;
        }
    </style>
    <ul  class="row  list-unstyled menu" style="display: flex; justify-content: space-between; list-style: none;">
        <li><a href="/">@lang('app.menu.main')</a></li>
        <li><a href="{{route('placesFormSHow')}}" class="{{request()->route()->named('placesFormSHow') ? 'active' : ''}}">@lang('app.menu.createPlace')</a></li>
        <li><a href="{{route('photoAddV2')}}" class="{{request()->route()->named('photoAddV2') ? 'active' : ''}}">@lang('app.menu.addPhoto')</a></li>
        <li><a href="{{route('places')}}" class="{{request()->route()->named('places') ? 'active' : ''}}">@lang('app.menu.allPlaces')</a></li>
        <li><a href="{{route('changeLocale', trans('app.changeLocale'))}}">@lang('app.changeLocale')</a></li>
    </ul>
</header>
