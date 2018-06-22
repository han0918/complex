@extends('layouts.home_base')
@section('title',$article->tilte.'_'.session('setting.name'))
@section('keywords',$article->tilte)
@section('description',mb_substr($article->content,0,80,'utf-8'))

<div class="view">
    @include('shared._head')

<!--._dise_detail-->
    <section class="wrap-box">
        <article class="mod-detail-header">
            <h1>{{$article->title}}</h1>
            <p class="header-date">
                <span>发布于 {{$article->created_at}}</span>
                <span><span class="header-link">{{session('setting.name')}}</span></span>
            </p>
        </article>

        <div class="mod-detail-infro">
            {!!$article->content!!}
        </div>

        <div class="col-details-tip">
            <p class="details-tips-prev details-tips-dif">
                <i class="ico-next"></i>
                <span>上一篇 :</span>
                @if(isset($prevarticle)&&count($prevarticle)>0)
                    <a href="{{route('article.home',['id'=>$prevarticle->id])}}"
                       class="keyword-link">{{$prevarticle->title}}</a>
                @else
                    没有了
                @endif
            </p>
            <p class="details-tips-prev details-tips-dif">
                <i class="ico-next"></i>
                <span>下一篇 :</span>
                @if(isset($nextarticle)&&count($nextarticle)>0)
                    <a href="{{route('article.home',['id'=>$nextarticle->id])}}"
                       class="keyword-link">{{$nextarticle->title}}</a>
                @else
                    没有了
                @endif
            </p>
        </div>
    </section>
    <!--.相关阅读-->
    <section class="wrap-box mtop noline--bottom">
        <h2>
            <span class="related-title">延伸阅读</span>
        </h2>
        <ul class="related-reading">
            @if(isset($randarticle)&&count($randarticle)>0)
                @foreach($randarticle as $item)
                    <li>
                        <a href="{{route('article.home',['id'=>$item->id])}}" class="reading-link">{{$item->title}}</a>
                    </li>
                @endforeach
            @endif
        </ul>
    </section>
    <!--/.相关阅读-->

    <!--.精彩推荐-->
    <section class="wrap-box wrap-box--res">
        <h2>
            <p class="related-title">精彩推荐</p>
        </h2>
        <ul class="com-dise-list no-pad">
            @if(isset($commendarticle)&&count($commendarticle)>0)
                @foreach($commendarticle as $item)
                    <li>
                        <div class="col-sex-part clr ml">
                            <div class="mix-two-pic">
                                <a href="{{route('article.home',['id'=>$item->id])}}"
                                   class="mix-two-pic-link img-page-link">
                                    <img src="{{$item->images}}" alt="">
                                </a>
                            </div>
                            <dl>
                                <dt class="mix-two-title">
                                    <a href="{{route('article.home',['id'=>$item->id])}}" class="mix-title-link">{{$item->title}}</a>
                                </dt>
                                <dd class="mix-two-intro clr">
                                    <time class="time-hot-info pl">
                                        <span>{{$item->created_at}}</span>
                                        <span>1186人浏览</span>
                                    </time>
                                </dd>
                            </dl>
                        </div>
                    </li>
                @endforeach
            @endif

        </ul>
    </section>

</div>

