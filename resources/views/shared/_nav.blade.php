<!--.nav_dise-->
<nav class="nav">
    <ul class="nav-index-dise">
        <li class="nav-show-tab"><a href="{{route('categroy.home',['id'=>$categroy->id])}}" class="nav-link">首页</a></li>
        @if(count(session('subclass'))>0)
            @foreach(session('subclass') as $item)
                <li class="nav-show-tab "><a href="{{route('subclass.home',['id'=>$item->id])}}" class="nav-link ">{{$item->name}}</a></li>
            @endforeach
        @endif
        <li></li>
        <li></li>
        <li class="nav-show-tab"><a href="" class="nav-link nav-more"><span>更多</span> <i class="ico-nav-more"></i></a></li>
    </ul>
</nav>