<!--头部-->
<header class="header clr">
    <div class="header-home"><a href="{{route('home.index')}}"><i class="ico icon ico-header-home"></i></a></div>
    <nav class="header-nav">
        <div class="header-nav-item"><a href="{{route('home.index')}}" class="header-nav-link">{{session('setting.name')}}</a></div>
        <div class="header-nav-item"><a href="{{route('subclass.home',['id'=>$categroy->id])}}" class="header-nav-link">{{$categroy->name}}</a></div>
    </nav>
    <div class="header-right">
        <i class="ico icon ico-header-menu vam"></i>
    </div>
</header>