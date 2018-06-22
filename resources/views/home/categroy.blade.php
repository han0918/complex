@extends('layouts.home_base')
@section('title',$categroy->keyword.'_'.session('setting.name'))
@section('keywords',$categroy->keyword)
@section('description',$categroy->content)

@section('content')
<div class="view">
    <header class="header clr">
        <div class="header-home"><a href="{{route('home.index')}}"><i class="ico icon ico-header-home"></i></a></div>
        <nav class="header-nav">
            <div class="header-nav-item"><a href="{{route('home.index')}}" class="header-nav-link">{{session('setting.name')}}</a></div>
            <div class="header-nav-item"><a href="{{route('categroy.home',['id'=>$categroy->id])}}" class="header-nav-link">{{$categroy->name}}</a></div>
        </nav>
        <div class="header-right">
            <i class="ico icon ico-header-menu vam"></i>
        </div>
    </header>
    @include('shared._nav')
    <section class="wrap-box noline--bottom">
        <header class="col-dise-title">{{$categroy->name}}</header>
        <ul class="col-dise-term">
            <li>
                @if(isset($top)&&count($top)>0)
                    <dl class="dise-term-con clr">
                        <dt class="term-con-pic">
                            <a href="{{route('article.home',['id'=>$top->id])}}" class=""><img src="{{$top->images}}" alt="{{$top->title}}"></a>
                        </dt>
                        <dd class="term-con-txt"><span>{{strip_tags($top->content)}}</span><a href="{{route('article.home',['id'=>$top->id])}}" class="term-con-txt-link">［全文］</a>
                        </dd>
                    </dl>
                @endif
            </li>
            @if(isset($commend)&&count($commend)>0)
                @foreach($commend as $item)
                    <li>
                        <a href="{{route('subclass.home',['id'=>$item->id])}}" class="dise-term-link">
                            @if($loop->index == 1)
                                <i class="icon ico-dise-treat"></i>
                            @elseif($loop->index == 2)
                                <i class="icon ico-dise-rate"></i>
                            @else
                                <i class="icon ico-dise-harm"></i>
                            @endif
                            <article class="dise-harm-intro">
                                <h3>{{$item->name}}</h3>
                                <p class="dise-harm-intro-det">{{$item->title}}</p>
                            </article>
                            <i class="icon ico-dise-arrow"></i>
                        </a>
                    </li>
                @endforeach
            @endif
        </ul>
    </section>    <!--/.心率失常-->


    <!--.热点排行-->
    <section class="wrap-box wrap-box--res">
        <ul class="mod-hot-headline">
            @php
               $num = 1
            @endphp
            <img src="/images/hot.png" width="94px" height="23px">
            @if(isset($subclass)&&count($subclass)>0)
                @foreach($subclass as $item)
                    @if(isset($item->article)&&count($item->article)>0)
                        @foreach($item->article as $subarticle)

                            <li>
                                <a href="{{route('article.home',['id'=>$subarticle->id])}}" class="hot-headline-link">
                                    @if($num == 1)
                                        <span class="hot-headline-num bg-red">{{$num++}}</span>
                                        @elseif($num == 2 || $num == 3)
                                        <span class="hot-headline-num bg-black">{{$num++}}</span>
                                        @else
                                        <span class="hot-headline-num bg-grey">{{$num++}}</span>
                                        @endif
                                    <p class="hot-headline-txt">{{$subarticle->title}}</p>
                                </a>
                            </li>
                        @endforeach
                    @endif
                @endforeach
            @endif
        </ul>
    </section>
    <!--/.热点排行-->


@if(isset($attribute)&&count($attribute))
    @php $num = 1;$id = 4; @endphp
    @foreach($attribute as $item)
    @if($loop->index < 4)
    <section class="wrap-box mtop" id="leftTabBox{{$id++}}">
        <h2>
            <span class="related-title">{{$item->name}}</span>
            <ul class="dise-tab-item hd">
                @if(isset($item->article)&&count($item->article)>0)
                    @foreach($item->article as $value)
                        @if($loop->index < 4)
                            <li>{{$value->name}}</li>
                        @endif
                    @endforeach
                @endif
            </ul>
            <button class="btn-wrap"><i class="btn-related-exper dise-in part{{$num++}}"></i></button>
            <ul class="title-hide">
                @if(isset($item->article)&&count($item->article)>0)
                    @foreach($item->article as $value)
                        @if($loop->index > 3)
                            <li><a href="{{route('subclass.home',['id'=>$value->id])}}" class="title-hide-link">{{$value->name}}</a></li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </h2>

        <div class="tabBox">
            <div class="col-item-main bd">
                @if(isset($item->article)&&count($item->article)>0)
                    @foreach($item->article as $value)
                    <div class="item-main-con">
                        <ul class="com-dise-list">
                            @if(isset($value->subarticle)&&count($value->subarticle)>0)
                                @foreach($value->subarticle as $key)
                                    @if($loop->index <= 4 )
                                        <li>
                                            <div class="col-sex-part clr ml ">
                                                <div class="mix-two-pic">
                                                    <a href="{{route('article.home',['id'=>$key->id])}}"
                                                       class="mix-two-pic-link img-page-link">
                                                        <img src="{{$key->images}}" alt="{{$key->title}}">
                                                    </a>
                                                </div>
                                                <dl>
                                                    <dt class="mix-two-title">
                                                        <a href="{{route('article.home',['id'=>$key->id])}}" class="mix-info-link">
                                                            <span>{{$key->title}}</span>
                                                        </a>
                                                    </dt>
                                                    <dd class="mix-two-intro clr">
                                                        <time class="time-hot-info pl">
                                                            <span>{{$key->created_at}}</span>
                                                            <span>9725人浏览</span>
                                                        </time>
                                                    </dd>
                                                </dl>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                        <a href="{{route('subclass.home',['id'=>$value->id])}}" class="btn-more">更多疾病常识<i class="btn-more-arrow"></i></a>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    @endif
    @endforeach
@endif
</div>
@endsection
<script src="{{asset('/js/jquery-2.1.0.min.js')}}"></script>
<script>
    $(function(){
        if($('.term-con-txt span').text().length>50){
            var text=$('.term-con-txt span').text().substring(0,50)+"...";
            $('.term-con-txt span').text(text);
        }

    })

</script>
