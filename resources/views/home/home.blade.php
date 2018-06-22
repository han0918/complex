@extends('layouts.home_base')
@section('title','中国疑难病研治中心_主攻各种慢性顽固病_疑难杂症_服务于患者_疑难病研治中心')
@section('keywords','中国疑难病研治中心_主攻各种慢性顽固病_疑难杂症_服务于患者')
@section('description','中国疑难病研治中心是以科研、医疗医药、技术开发、中医药研究、主攻疑难杂症等为一体的综合性医药研究机构。 本院汇集了大批高水平的著名老中医专家，在一些慢性顽固病、疑难杂症的研究治疗上各具特色，在国内外享有较高的声誉')

@section('content')
<div class="view">
    <!--头部-->
    <header class="header clr">

        <div class="header-home"><a href="{{route('home.index')}}"><i class="ico icon ico-header-home"></i></a></div>
        <nav class="header-nav">
            <div class="header-nav-item"><a href="{{route('home.index')}}" class="header-nav-link">{{session('setting.name')}}</a></div>
            <div class="header-nav-item"><a href="{{route('home.index')}}"  class="header-nav-link">首页</a></div>
        </nav>

        <div class="header-right">
            <i class="ico icon ico-header-menu vam" ></i>
        </div>
    </header>

    <section class="wrap-box lay-switch">
        <!--.疾病列表-->
        <h2>
            <span class="related-title">首页</span>
            <button class="btn-vertical btn-vertical--active"></button>
            <button class="btn-transv"></button>
        </h2>
        <div class="tac">
            <fh-ad-plus fh-ad-pid="5"></fh-ad-plus>
        </div>
        <div class="com-box" style="min-height: 650px">
            <ul class="com-dise-list">
            @if(isset($categroy)&&count($categroy)>0)
                @foreach($categroy as $item)
                <li>
                    <div class="col-sex-part clr ml">
                        <div class="mix-two-pic">
                            <a href="{{route('categroy.home',['id'=>$item->id])}}" class="mix-two-pic-link">
                                <img src="{{$item->images}}" alt="{{$item->name}}">
                            </a>
                        </div>
                        <dl>
                            <dt class="dise-list-header">
                                <a href="{{route('categroy.home',['id'=>$item->id])}}" class="dise-list-link">{{$item->name}}</a>
                            </dt>
                            <dd class="depart-txt">
                                <a href="{{route('categroy.home',['id'=>$item->id])}}" class="depart-txt-link pl">
                                    <span>{{$item->keyword}}</span>
                                </a>
                            </dd>
                        </dl>
                    </div>
                </li>
                @endforeach
            @endif
            </ul>
            <ul class="com-transv-show" style="min-height: 650px">
            @if(isset($categroy)&&count($categroy)>0)
                @foreach($categroy as $item)
                <li>
                    <a href="{{route('categroy.home',['id'=>$item->id])}}" class="transv-show-link">
                        <div class="show-cover"><img src="{{$item->images}}" alt="{{$item->name}}"></div>
                        <p class="show-txt">{{$item->name}}</p>
                    </a>
                </li>
                @endforeach
            @endif
            </ul>
        </div>
        <!--/.疾病列表-->
        <!--.分页-->
         {{ $categroy->links() }}
    </section>
</div>
@endsection
<script>
    // cnzz
    (function () {
        var cnzz = document.createElement("script");
        cnzz.src = "//s4.cnzz.com/z_stat.php?id=1256450513&web_id=1256450513";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(cnzz, s);

        var header = document.getElementsByTagName('head')[0];
        var style = document.createElement('style');
        var css = 'a[title="站长统计"] {display: none;}';
        style.type = 'text/css';

        try {
            style.appendChild(document.createTextNode(css));
        } catch (e) {
            style.styleSheet.cssText = css;
        }

        header.appendChild(style);
    })();
</script>
