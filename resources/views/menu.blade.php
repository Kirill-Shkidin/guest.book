<li class="nav-item {{ request()->routeIs('show.all')?'active':'' }}">
    <a class="nav-link" href="{{ route('show.all') }}">API All</a>
</li>
<li class="nav-item {{ request()->routeIs('create')?'active':'' }}">
    <a class="nav-link" href="{{ route('create') }}">Создать объявление</a>
</li>

{{--@if(Auth::user()->status ?? false)--}}
{{--<li class="nav-item {{ request()->routeIs('admin.news.index')?'active':'' }}">--}}
{{--    <a class="nav-link" href="{{ route('admin.news.index') }}">Админ</a>--}}
{{--</li>--}}
{{--@endif--}}
{{--<li class="nav-item {{ request()->routeIs('news.categories.index')?'active':'' }}">--}}
{{--    <a class="nav-link" href="{{ route('news.categories.index') }}">Категории</a>--}}
{{--</li>--}}
