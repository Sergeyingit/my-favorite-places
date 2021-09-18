<header class="container">
    <style>
        .menu li .active {
            border-bottom: 1px solid blue;
        }
    </style>
    <ul  class="row menu" style="display: flex; justify-content: space-between; list-style: none;">
        <li><a href="/">Главная</a></li>
        <li><a href="{{route('placesFormSHow')}}" class="{{request()->route()->named('placesFormSHow') ? 'active' : ''}}">Создать место</a></li>
        <li><a href="{{route('photoAddV2')}}" class="{{request()->route()->named('photoAddV2') ? 'active' : ''}}">Добавить фотографию к месту</a></li>
        <li><a href="{{route('places')}}" class="{{request()->route()->named('places') ? 'active' : ''}}">Все места</a></li>
    </ul>
</header>
