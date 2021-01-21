<nav class="nav d-flex justify-content-start ">
    @foreach($menus as $menu)
        <a class="p-2 text-muted {{ (request()->routeIs($menu['name'].'*')) ? 'active' : '' }}"
           href="{{$menu['url']}}">{{$menu['label']}}</a>
        @endforeach
</nav>
