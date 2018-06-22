@extends('layouts.home_base')
@section('title',$categroy->keyword.'_'.session('setting.name'))
@section('keywords',$categroy->keyword)
@section('description',$categroy->content)

@section('content')
    <div class="view">
        @include('shared._head')
        @include('shared._nav')

        <section class="wrap-box noline--bottom">
            <ul class="hot-survey-top">
                @if(isset($top)&&count($top)>0)
                    @php $num = 1; @endphp
                    @foreach($top as $item)
                    <li>
                        <div class="top-num">
                            @if($loop->index == 0)
                                <p class="top-num-cir red-hot">0{{$num++}}</p>
                            @elseif($loop->index == 1)
                                <p class="top-num-cir orange-hot">0{{$num++}}</p>
                            @else
                                <p class="top-num-cir yellow-hot">0{{$num++}}</p>
                            @endif
                            <p class="top-num-triangle"></p>
                            <p class="top-num-txt">TOP</p>
                        </div>
                        <articel class="top-txt">
                            <a href="{{route('article.home',['id'=>$item->id])}}" class="top-txt-link">
                                <h3>{{$item->title}}</h3>
                                <p class="top-txt-intro">{{strip_tags($item->content)}}</p>
                            </a>
                        </articel>
                    </li>
                    @endforeach
                @endif
            </ul>
        </section>
        <section class="wrap-box wrap-box--res">

            <!--.疾病常识-->
            <h2><span class="related-title">疾病常识</span></h2>

            <ul class="com-dise-list">
                @if(isset($article)&&count($article)>0)
                    @foreach($article as $item)
                        <li>
                            <div class="col-sex-part clr ml  ">
                                <div class="mix-two-pic">
                                    <a href="{{route('article.home',['id'=>$item->id])}}"
                                       class="mix-two-pic-link img-page-link">
                                        <img src="{{$item->images}}" alt="{{$item->title}}">
                                    </a>
                                </div>
                                <dl>
                                    <dt class="mix-two-title">
                                        <a href="{{route('article.home',['id'=>$item->id])}}" class="mix-info-link">
                                            <span>{{$item->title}}</span>
                                        </a>
                                    </dt>
                                    <dd class="mix-two-intro clr">
                                        <time class="time-hot-info pl">
                                            <span>{{$item->created_at}}</span>
                                            <span>9725人浏览</span>
                                        </time>
                                    </dd>
                                </dl>
                            </div>
                        </li>
                    @endforeach
                @endif

            </ul>
        </section>
        {{ $article->links() }}

    </div>

@endsection
