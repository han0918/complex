<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{$categroy->keyword}}</title>
    <meta name="keywords" content="{{$categroy->keyword}}">
    <meta name="description" content="{{$categroy->content}}">
    <meta name="fh-ad-keywords" content="{{$categroy->name}}">
    <meta name="ip-enabled" content="true"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="format-detection" content="telephone=no,email=no">
    <meta name="applicable-device" content="mobile">
    <link rel="stylesheet" href="https://static2.fh21.com.cn/disease/wap/css/style.css">

    <link rel="canonical" href="https://www.fh21.com.cn/nk/jrsy/">

    <script src="https://static2.fh21.com.cn/disease/wap/js/TouchSlide.1.1.js"></script>
    <script src="https://static2.fh21.com.cn/disease/wap/js/zepto.min.js"></script>
    <script src="https://static2.fh21.com.cn/disease/wap/js/dise.js"></script>
</head>
<body>

<div class="view">
    <!--头部-->
    <header class="header clr">

        <div class="header-home"><a href="{{route('home.index')}}"><i class="ico icon ico-header-home"></i></a></div>

        <nav class="header-nav">
            <div class="header-nav-item"><a href="{{route('home.index')}}" class="header-nav-link">疑难病研治中心</a></div>
            <div class="header-nav-item"><a href="{{route('categroy.home',['id'=>$categroy->id])}}" class="header-nav-link">{{$categroy->name}}</a></div>
        </nav>

        <div class="header-right">
            <i class="ico icon ico-header-menu vam"></i>
        </div>

    </header>


    <!--.nav_dise-->
    <nav class="nav">
        <ul class="nav-index-dise">
            <li class="nav-show-tab"><a href="{{route('categroy.home',['id'=>$categroy->id])}}" class="nav-link">首页</a></li>
            @if(isset($subclass)&&count($subclass)>0)
                @foreach($subclass as $item)
                    <li class="nav-show-tab "><a href="{{route('subclass.home',['id'=>$item->id])}}" class="nav-link ">{{$item->name}}</a></li>
                @endforeach
            @endif
            <li></li>
            <li></li>
            <li class="nav-show-tab"><a href="" class="nav-link nav-more"><span>更多</span> <i
                            class="ico-nav-more"></i></a></li>
        </ul>
    </nav>    <!--/.nav_dise-->

    <!--.心率失常-->
    <section class="wrap-box noline--bottom">
        <header class="col-dise-title">{{$categroy->name}}</header>
        <ul class="col-dise-term">
            <li>
                @if(isset($top)&&count($top)>0)
                    <dl class="dise-term-con clr">
                        <dt class="term-con-pic">
                            <a href="{{route('article.home',['id'=>$top->id])}}" class=""><img src="{{$top->images}}" alt="{{$top->title}}"></a>
                        </dt>
                        <dd class="term-con-txt">{{strip_tags($top->content)}}<a href="{{route('article.home',['id'=>$top->id])}}" class="term-con-txt-link">［全文］</a>
                        </dd>
                    </dl>
                @endif
            </li>
            @if(isset($subclass)&&count($subclass)>0)
                @foreach($subclass as $item)
                    @if($item->state == 1)
                        @if($loop->index < 4)
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
                                    <p class="dise-harm-intro-det">{{$item->keyword}}</p>
                                </article>
                                <i class="icon ico-dise-arrow"></i>
                            </a>
                        </li>
                        @endif
                    @endif
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
    </section>    <!--/.热点排行-->

    <!--.疾病常识-->
    <section class="wrap-box mtop" id="leftTabBox4">
        <h2>
            <span class="related-title">疾病常识</span>
            <ul class="dise-tab-item hd">
                <li>概况</li>
                <li>病因</li>
                <li>症状</li>
                <li>发作</li>
            </ul>
            <button class="btn-wrap"><i class="btn-related-exper dise-in part1"></i></button>
            <ul class="title-hide">
                <li><a href="../8980/index.html" class="title-hide-link">遗传</a></li>
                <li><a href="../8981/index.html" class="title-hide-link">传染</a></li>
                <li><a href="../6306/index.html" class="title-hide-link">危害</a></li>
                <li><a href="../8982/index.html" class="title-hide-link">寿命</a></li>
            </ul>
        </h2>
        <div class="tabBox">
            <div class="col-item-main bd">
                <div class="item-main-con">
                    <ul class="com-dise-list">
                        <li>
                            <div class="col-sex-part clr ml ">
                                <div class="mix-two-pic">
                                    <a href="https://m.fh21.com.cn/jibing/view/5303593.html"
                                       class="mix-two-pic-link img-page-link">
                                        <img src="https://file.fh21static.com/fhfile1/M00/64/0E/oYYBAFqXlHeAJ7G_AACet-hRHeI44.jpeg"
                                             alt="">
                                    </a>
                                </div>
                                <dl>
                                    <dt class="mix-two-title">
                                        <a href="https://m.fh21.com.cn/jibing/view/5303593.html" class="mix-info-link">
                                            <span>尖锐湿疣是性病吗</span>
                                        </a>
                                    </dt>
                                    <dd class="mix-two-intro clr">
                                        <time class="time-hot-info pl">
                                            <span>2018-03-01</span>
                                            <span>9725人浏览</span>
                                        </time>
                                    </dd>
                                </dl>
                            </div>
                        </li>
                        <li>
                            <div class="col-sex-part clr ml ">
                                <div class="mix-two-pic">
                                    <a href="https://m.fh21.com.cn/jibing/view/5294913.html"
                                       class="mix-two-pic-link img-page-link">
                                        <img src="https://file.fh21static.com/fhfile1/M00/63/78/ooYBAFpu4IiAJGAqAABpqjbB1eo56.jpeg"
                                             alt="">
                                    </a>
                                </div>
                                <dl>
                                    <dt class="mix-two-title">
                                        <a href="https://m.fh21.com.cn/jibing/view/5294913.html" class="mix-info-link">
                                            <span>尖锐湿疣的误区都有哪些</span>
                                        </a>
                                    </dt>
                                    <dd class="mix-two-intro clr">
                                        <time class="time-hot-info pl">
                                            <span>2018-01-29</span>
                                            <span>2514人浏览</span>
                                        </time>
                                    </dd>
                                </dl>
                            </div>
                        </li>
                        <li>
                            <div class="col-sex-part clr ml ">
                                <div class="mix-two-pic">
                                    <a href="https://m.fh21.com.cn/jibing/view/5289237.html"
                                       class="mix-two-pic-link img-page-link">
                                        <img src="https://file.fh21static.com/fhfile1/M00/61/FA/ooYBAFpe-iOAJ2vzAAFjQmYB1xk88.jpeg"
                                             alt="">
                                    </a>
                                </div>
                                <dl>
                                    <dt class="mix-two-title">
                                        <a href="https://m.fh21.com.cn/jibing/view/5289237.html" class="mix-info-link">
                                            <span>尖锐湿疣的介绍</span>
                                        </a>
                                    </dt>
                                    <dd class="mix-two-intro clr">
                                        <time class="time-hot-info pl">
                                            <span>2018-01-17</span>
                                            <span>9984人浏览</span>
                                        </time>
                                    </dd>
                                </dl>
                            </div>
                        </li>
                        <li>
                            <div class="col-sex-part clr ml ">
                                <div class="mix-two-pic">
                                    <a href="https://m.fh21.com.cn/jibing/view/5262752.html"
                                       class="mix-two-pic-link img-page-link">
                                        <img src="https://file.fh21static.com/fhfile1/M00/5F/E8/o4YBAFoTlSeARsvNAACPgfQiSDQ18.jpeg"
                                             alt="">
                                    </a>
                                </div>
                                <dl>
                                    <dt class="mix-two-title">
                                        <a href="https://m.fh21.com.cn/jibing/view/5262752.html" class="mix-info-link">
                                            <span>早期的尖锐湿疣疼吗</span>
                                        </a>
                                    </dt>
                                    <dd class="mix-two-intro clr">
                                        <time class="time-hot-info pl">
                                            <span>2017-11-21</span>
                                            <span>9515人浏览</span>
                                        </time>
                                    </dd>
                                </dl>
                            </div>
                        </li>

                    </ul>
                    <a href="../7304/index.html" class="btn-more">更多疾病常识<i class="btn-more-arrow"></i></a>
                </div>
                <div class="item-main-con">
                    <ul class="com-dise-list">
                        <li>
                            <div class="col-sex-part clr ml ">
                                <div class="mix-two-pic">
                                    <a href="https://m.fh21.com.cn/jibing/view/5302492.html"
                                       class="mix-two-pic-link img-page-link">
                                        <img src="https://file.fh21static.com/fhfile1/M00/64/04/ooYBAFqU7juAKR-JAAC83D_51HY61.jpeg"
                                             alt="">
                                    </a>
                                </div>
                                <dl>
                                    <dt class="mix-two-title">
                                        <a href="https://m.fh21.com.cn/jibing/view/5302492.html" class="mix-info-link">
                                            <span>尖锐湿疣是如何引起的呢</span>
                                        </a>
                                    </dt>
                                    <dd class="mix-two-intro clr">
                                        <time class="time-hot-info pl">
                                            <span>2018-02-27</span>
                                            <span>9724人浏览</span>
                                        </time>
                                    </dd>
                                </dl>
                            </div>
                        </li>
                        <li>
                            <div class="col-sex-part clr ml ">
                                <div class="mix-two-pic">
                                    <a href="https://m.fh21.com.cn/jibing/view/5302471.html"
                                       class="mix-two-pic-link img-page-link">
                                        <img src="https://file.fh21static.com/fhfile1/M00/64/03/ooYBAFqU69yALiEZAAGV1CjiVEw65.jpeg"
                                             alt="">
                                    </a>
                                </div>
                                <dl>
                                    <dt class="mix-two-title">
                                        <a href="https://m.fh21.com.cn/jibing/view/5302471.html" class="mix-info-link">
                                            <span>尖锐湿疣是何因素所导致</span>
                                        </a>
                                    </dt>
                                    <dd class="mix-two-intro clr">
                                        <time class="time-hot-info pl">
                                            <span>2018-02-27</span>
                                            <span>8996人浏览</span>
                                        </time>
                                    </dd>
                                </dl>
                            </div>
                        </li>
                        <li>
                            <div class="col-sex-part clr ml ">
                                <div class="mix-two-pic">
                                    <a href="https://m.fh21.com.cn/jibing/view/5299251.html"
                                       class="mix-two-pic-link img-page-link">
                                        <img src="https://file.fh21static.com/fhfile1/M00/63/B4/oYYBAFp760KAQiAgAADHJdycVwg27.jpeg"
                                             alt="">
                                    </a>
                                </div>
                                <dl>
                                    <dt class="mix-two-title">
                                        <a href="https://m.fh21.com.cn/jibing/view/5299251.html" class="mix-info-link">
                                            <span>女性尖锐湿疣的原因有哪些吗</span>
                                        </a>
                                    </dt>
                                    <dd class="mix-two-intro clr">
                                        <time class="time-hot-info pl">
                                            <span>2018-02-08</span>
                                            <span>7997人浏览</span>
                                        </time>
                                    </dd>
                                </dl>
                            </div>
                        </li>
                        <li>
                            <div class="col-sex-part clr ml ">
                                <div class="mix-two-pic">
                                    <a href="https://m.fh21.com.cn/jibing/view/5296202.html"
                                       class="mix-two-pic-link img-page-link">
                                        <img src="https://file.fh21static.com/fhfile1/M00/63/81/oYYBAFpxNM2ATTcLAADFJ2YaSao10.jpeg"
                                             alt="">
                                    </a>
                                </div>
                                <dl>
                                    <dt class="mix-two-title">
                                        <a href="https://m.fh21.com.cn/jibing/view/5296202.html" class="mix-info-link">
                                            <span>导致女性尖锐疣的病因有哪些</span>
                                        </a>
                                    </dt>
                                    <dd class="mix-two-intro clr">
                                        <time class="time-hot-info pl">
                                            <span>2018-01-31</span>
                                            <span>8914人浏览</span>
                                        </time>
                                    </dd>
                                </dl>
                            </div>
                        </li>

                    </ul>
                    <a href="../6305/index.html" class="btn-more">更多疾病常识<i class="btn-more-arrow"></i></a>
                </div>
                <div class="item-main-con">
                    <ul class="com-dise-list">
                        <li>
                            <div class="col-sex-part clr ml ">
                                <div class="mix-two-pic">
                                    <a href="https://m.fh21.com.cn/jibing/view/5303586.html"
                                       class="mix-two-pic-link img-page-link">
                                        <img src="https://file.fh21static.com/fhfile1/M00/64/0E/oYYBAFqXk0SAK8eAAABmPMflqnY32.jpeg"
                                             alt="">
                                    </a>
                                </div>
                                <dl>
                                    <dt class="mix-two-title">
                                        <a href="https://m.fh21.com.cn/jibing/view/5303586.html" class="mix-info-link">
                                            <span>男性尖锐湿疣的表现都有哪些</span>
                                        </a>
                                    </dt>
                                    <dd class="mix-two-intro clr">
                                        <time class="time-hot-info pl">
                                            <span>2018-03-01</span>
                                            <span>8113人浏览</span>
                                        </time>
                                    </dd>
                                </dl>
                            </div>
                        </li>
                        <li>
                            <div class="col-sex-part clr ml ">
                                <div class="mix-two-pic">
                                    <a href="https://m.fh21.com.cn/jibing/view/5299259.html"
                                       class="mix-two-pic-link img-page-link">
                                        <img src="https://file.fh21static.com/fhfile1/M00/63/B4/oYYBAFp77OmAYgOUAACRBCtbSRw80.jpeg"
                                             alt="">
                                    </a>
                                </div>
                                <dl>
                                    <dt class="mix-two-title">
                                        <a href="https://m.fh21.com.cn/jibing/view/5299259.html" class="mix-info-link">
                                            <span>不同时期时尖锐湿疣的症状表现有哪些呢</span>
                                        </a>
                                    </dt>
                                    <dd class="mix-two-intro clr">
                                        <time class="time-hot-info pl">
                                            <span>2018-02-08</span>
                                            <span>7353人浏览</span>
                                        </time>
                                    </dd>
                                </dl>
                            </div>
                        </li>
                        <li>
                            <div class="col-sex-part clr ml ">
                                <div class="mix-two-pic">
                                    <a href="https://m.fh21.com.cn/jibing/view/5296192.html"
                                       class="mix-two-pic-link img-page-link">
                                        <img src="https://file.fh21static.com/fhfile1/M00/63/81/oYYBAFpxNFuAPCy4AAC3x4hWmgI99.jpeg"
                                             alt="">
                                    </a>
                                </div>
                                <dl>
                                    <dt class="mix-two-title">
                                        <a href="https://m.fh21.com.cn/jibing/view/5296192.html" class="mix-info-link">
                                            <span>尖锐湿疣有哪些症状症状表现</span>
                                        </a>
                                    </dt>
                                    <dd class="mix-two-intro clr">
                                        <time class="time-hot-info pl">
                                            <span>2018-01-31</span>
                                            <span>8524人浏览</span>
                                        </time>
                                    </dd>
                                </dl>
                            </div>
                        </li>
                        <li>
                            <div class="col-sex-part clr ml ">
                                <div class="mix-two-pic">
                                    <a href="https://m.fh21.com.cn/jibing/view/5274866.html"
                                       class="mix-two-pic-link img-page-link">
                                        <img src="https://file.fh21static.com/fhfile1/M00/61/21/o4YBAFowlJ2AO_kaAACdLNlU5QE95.jpeg"
                                             alt="">
                                    </a>
                                </div>
                                <dl>
                                    <dt class="mix-two-title">
                                        <a href="https://m.fh21.com.cn/jibing/view/5274866.html" class="mix-info-link">
                                            <span>尖锐湿疣的症状有哪些典型表现</span>
                                        </a>
                                    </dt>
                                    <dd class="mix-two-intro clr">
                                        <time class="time-hot-info pl">
                                            <span>2017-12-13</span>
                                            <span>8595人浏览</span>
                                        </time>
                                    </dd>
                                </dl>
                            </div>
                        </li>

                    </ul>
                    <a href="../6299/index.html" class="btn-more">更多疾病常识<i class="btn-more-arrow"></i></a>
                </div>
                <div class="item-main-con">
                    <ul class="com-dise-list">
                        <li>
                            <div class="col-sex-part clr ml ">
                                <div class="mix-two-pic">
                                    <a href="https://m.fh21.com.cn/jibing/view/5304859.html"
                                       class="mix-two-pic-link img-page-link">
                                        <img src="https://file.fh21static.com/fhfile1/M00/64/2A/oYYBAFqeKHeAfPAqAADxYZFBClo05.jpeg"
                                             alt="">
                                    </a>
                                </div>
                                <dl>
                                    <dt class="mix-two-title">
                                        <a href="https://m.fh21.com.cn/jibing/view/5304859.html" class="mix-info-link">
                                            <span>什么原因令尖锐湿疣患者反复发作呢</span>
                                        </a>
                                    </dt>
                                    <dd class="mix-two-intro clr">
                                        <time class="time-hot-info pl">
                                            <span>2018-03-06</span>
                                            <span>8173人浏览</span>
                                        </time>
                                    </dd>
                                </dl>
                            </div>
                        </li>
                        <li>
                            <div class="col-sex-part clr ml ">
                                <div class="mix-two-pic">
                                    <a href="https://m.fh21.com.cn/jibing/view/5304858.html"
                                       class="mix-two-pic-link img-page-link">
                                        <img src="https://file.fh21static.com/fhfile1/M00/64/2F/ooYBAFqeJ6-ACe6SAAEkAtgpa5I74.jpeg"
                                             alt="">
                                    </a>
                                </div>
                                <dl>
                                    <dt class="mix-two-title">
                                        <a href="https://m.fh21.com.cn/jibing/view/5304858.html" class="mix-info-link">
                                            <span>要怎样预防尖锐湿疣的发作呢</span>
                                        </a>
                                    </dt>
                                    <dd class="mix-two-intro clr">
                                        <time class="time-hot-info pl">
                                            <span>2018-03-06</span>
                                            <span>3722人浏览</span>
                                        </time>
                                    </dd>
                                </dl>
                            </div>
                        </li>
                        <li>
                            <div class="col-sex-part clr ml ">
                                <div class="mix-two-pic">
                                    <a href="https://m.fh21.com.cn/jibing/view/5235568.html"
                                       class="mix-two-pic-link img-page-link">
                                        <img src="https://file.fh21static.com/fhfile1/M00/59/DE/ooYBAFnAf9CAQ2eMAADUZ-hPcYc21.jpeg"
                                             alt="">
                                    </a>
                                </div>
                                <dl>
                                    <dt class="mix-two-title">
                                        <a href="https://m.fh21.com.cn/jibing/view/5235568.html" class="mix-info-link">
                                            <span>尖锐湿疣反复发作的原因是什么</span>
                                        </a>
                                    </dt>
                                    <dd class="mix-two-intro clr">
                                        <time class="time-hot-info pl">
                                            <span>2017-09-19</span>
                                            <span>5941人浏览</span>
                                        </time>
                                    </dd>
                                </dl>
                            </div>
                        </li>
                        <li>
                            <div class="col-sex-part clr ml ">
                                <div class="mix-two-pic">
                                    <a href="https://m.fh21.com.cn/jibing/view/670311.html"
                                       class="mix-two-pic-link img-page-link">
                                        <img src="http://file.fh21.com.cn/fhfile1/M00/3B/01/o4YBAFc9t1iAJMDhAAApa4cvYO489_260x195.jpeg"
                                             alt="">
                                    </a>
                                </div>
                                <dl>
                                    <dt class="mix-two-title">
                                        <a href="https://m.fh21.com.cn/jibing/view/670311.html" class="mix-info-link">
                                            <span>肛内尖锐湿疣反复复发</span>
                                        </a>
                                    </dt>
                                    <dd class="mix-two-intro clr">
                                        <time class="time-hot-info pl">
                                            <span>2016-06-24</span>
                                            <span>5294人浏览</span>
                                        </time>
                                    </dd>
                                </dl>
                            </div>
                        </li>

                    </ul>
                    <a href="../8988/index.html" class="btn-more">更多疾病常识<i class="btn-more-arrow"></i></a>
                </div>

            </div>
        </div>

    </section>    <!--/.疾病常识-->

    <!--.诊断治疗-->
    <section class="wrap-box mtop" id="leftTabBox5">
        <h2>
            <span class="related-title">诊断治疗</span>
            <ul class="dise-tab-item hd">
                <li>诊断</li>
                <li>检查</li>
                <li>用药</li>
                <li>治疗</li>
            </ul>
            <button class="btn-wrap"><i class="btn-related-exper dise-in part2"></i></button>
            <ul class="title-hide">
                <li><a href="https://m.fh21.com.cn/jibing/list/6302/" class="title-hide-link">预防</a></li>
                <li><a href="https://m.fh21.com.cn/jibing/list/8984/" class="title-hide-link">治愈率</a></li>
            </ul>
        </h2>
        <div class="tabBox">
            <div class="col-item-main bd">
                <div class="item-main-con">
                    <ul class="com-dise-list">
                        <li>
                            <div class="col-sex-part clr ml ">
                                <div class="mix-two-pic">
                                    <a href="https://m.fh21.com.cn/jibing/view/656221.html"
                                       class="mix-two-pic-link img-page-link">
                                        <img src="https://file.fh21static.com/fhfile1/M00/59/7C/ooYBAFmnv9yAGO2MAABV1iElirc75.jpeg"
                                             alt="">
                                    </a>
                                </div>
                                <dl>
                                    <dt class="mix-two-title">
                                        <a href="https://m.fh21.com.cn/jibing/view/656221.html" class="mix-info-link">
                                            <span>患有尖锐湿疣如何鉴定</span>
                                        </a>
                                    </dt>
                                    <dd class="mix-two-intro clr">
                                        <time class="time-hot-info pl">
                                            <span>2016-05-21</span>
                                            <span>5045人浏览</span>
                                        </time>
                                    </dd>
                                </dl>
                            </div>
                        </li>

                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/499992.html" class="com-dise-list-link">
                                <span class="com-dise-list-txt">尖锐湿疣的西医诊断</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/499484.html" class="com-dise-list-link">
                                <span class="com-dise-list-txt">尖锐湿疣的中医诊断是怎样的</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/499225.html" class="com-dise-list-link">
                                <span class="com-dise-list-txt">尖锐湿疣的诊断鉴别</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/498999.html" class="com-dise-list-link">
                                <i class="com-dise-list-hot">热</i>
                                <span class="com-dise-list-txt">尖锐湿疣的检查项目有哪几项</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/498717.html" class="com-dise-list-link">
                                <i class="com-dise-list-hot">热</i>
                                <span class="com-dise-list-txt">解读欧洲指南中生殖器疣的诊断</span>
                            </a>
                        </li>
                    </ul>
                    <a href="../6304/index.html" class="btn-more">更多诊断治疗<i class="btn-more-arrow"></i></a>
                </div>
                <div class="item-main-con">
                    <ul class="com-dise-list">
                        <li>
                            <div class="col-sex-part clr ml ">
                                <div class="mix-two-pic">
                                    <a href="https://m.fh21.com.cn/jibing/view/4401751.html"
                                       class="mix-two-pic-link img-page-link">
                                        <img src="https://file.fh21static.com/fhfile1/M00/59/7C/ooYBAFmnwFKAUnT_AAB1mnOwRho52.jpeg"
                                             alt="">
                                    </a>
                                </div>
                                <dl>
                                    <dt class="mix-two-title">
                                        <a href="https://m.fh21.com.cn/jibing/view/4401751.html" class="mix-info-link">
                                            <span>尖锐湿疣怎么检查出来</span>
                                        </a>
                                    </dt>
                                    <dd class="mix-two-intro clr">
                                        <time class="time-hot-info pl">
                                            <span>2017-05-31</span>
                                            <span>4600人浏览</span>
                                        </time>
                                    </dd>
                                </dl>
                            </div>
                        </li>

                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/508862.html" class="com-dise-list-link">
                                <span class="com-dise-list-txt">醋酸如何测试尖锐湿疣</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/508669.html" class="com-dise-list-link">
                                <span class="com-dise-list-txt">醋白试验后尖锐湿疣图片</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/508062.html" class="com-dise-list-link">
                                <span class="com-dise-list-txt">初期尖锐湿疣怎么检查</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/507876.html" class="com-dise-list-link">
                                <i class="com-dise-list-hot">热</i>
                                <span class="com-dise-list-txt">初期尖锐湿疣醋白试验会发现不</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/502151.html" class="com-dise-list-link">
                                <i class="com-dise-list-hot">热</i>
                                <span class="com-dise-list-txt">用白醋测试尖锐湿疣准吗</span>
                            </a>
                        </li>
                    </ul>
                    <a href="../6300/index.html" class="btn-more">更多诊断治疗<i class="btn-more-arrow"></i></a>
                </div>
                <div class="item-main-con">
                    <ul class="com-dise-list">
                        <li>
                            <div class="col-sex-part clr ml ">
                                <div class="mix-two-pic">
                                    <a href="https://m.fh21.com.cn/jibing/view/555163.html"
                                       class="mix-two-pic-link img-page-link">
                                        <img src="https://file.fh21.com.cn/fhfile1/M00/51/69/oYYBAFkUM8KAXSTwAAAhqQC-3to738.jpg"
                                             alt="">
                                    </a>
                                </div>
                                <dl>
                                    <dt class="mix-two-title">
                                        <a href="https://m.fh21.com.cn/jibing/view/555163.html" class="mix-info-link">
                                            <span>尖锐湿疣用药治疗怎么样</span>
                                        </a>
                                    </dt>
                                    <dd class="mix-two-intro clr">
                                        <time class="time-hot-info pl">
                                            <span>2016-03-02</span>
                                            <span>6863人浏览</span>
                                        </time>
                                    </dd>
                                </dl>
                            </div>
                        </li>

                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/512198.html" class="com-dise-list-link">
                                <span class="com-dise-list-txt">药物治尖锐湿疣</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/512192.html" class="com-dise-list-link">
                                <span class="com-dise-list-txt">中药治疗尖锐湿疣</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/508180.html" class="com-dise-list-link">
                                <span class="com-dise-list-txt">中医治疗尖锐湿疣的药有哪些</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/507258.html" class="com-dise-list-link">
                                <i class="com-dise-list-hot">热</i>
                                <span class="com-dise-list-txt">什么药物治疗尖锐湿疣</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/506942.html" class="com-dise-list-link">
                                <i class="com-dise-list-hot">热</i>
                                <span class="com-dise-list-txt">治疗尖锐湿疣用什么药比较好</span>
                            </a>
                        </li>
                    </ul>
                    <a href="../8983/index.html" class="btn-more">更多诊断治疗<i class="btn-more-arrow"></i></a>
                </div>
                <div class="item-main-con">
                    <ul class="com-dise-list">
                        <li>
                            <div class="col-sex-part clr ml ">
                                <div class="mix-two-pic">
                                    <a href="https://m.fh21.com.cn/jibing/view/507937.html"
                                       class="mix-two-pic-link img-page-link">
                                        <img src="https://file.fh21.com.cn/fhfile1/M00/51/7D/o4YBAFkUOtOADQHSAAD4xeOWNy0752.jpg"
                                             alt="">
                                    </a>
                                </div>
                                <dl>
                                    <dt class="mix-two-title">
                                        <a href="https://m.fh21.com.cn/jibing/view/507937.html" class="mix-info-link">
                                            <span>初期尖锐湿疣的治疗</span>
                                        </a>
                                    </dt>
                                    <dd class="mix-two-intro clr">
                                        <time class="time-hot-info pl">
                                            <span>2015-12-23</span>
                                            <span>2740人浏览</span>
                                        </time>
                                    </dd>
                                </dl>
                            </div>
                        </li>

                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/520007.html" class="com-dise-list-link">
                                <span class="com-dise-list-txt">大面积尖锐湿疣的治疗</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/520006.html" class="com-dise-list-link">
                                <span class="com-dise-list-txt">尖锐湿疣的治疗经历</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/520004.html" class="com-dise-list-link">
                                <span class="com-dise-list-txt">尖锐湿疣的治疗原则</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/518616.html" class="com-dise-list-link">
                                <i class="com-dise-list-hot">热</i>
                                <span class="com-dise-list-txt">尖锐湿疣的中医治疗方法</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/518488.html" class="com-dise-list-link">
                                <i class="com-dise-list-hot">热</i>
                                <span class="com-dise-list-txt">尖锐湿疣的外科治疗方法</span>
                            </a>
                        </li>
                    </ul>
                    <a href="https://m.fh21.com.cn/jibing/list/6301/" class="btn-more">更多诊断治疗<i
                                class="btn-more-arrow"></i></a>
                </div>

            </div>
        </div>
    </section>    <!--/.诊断治疗-->

    <!--.护理保健-->
    <section class="wrap-box mtop" id="leftTabBox6">
        <h2>
            <span class="related-title">护理保健</span>
            <ul class="dise-tab-item hd">
                <li>饮食</li>
                <li>孕产</li>
                <li>护理</li>
                <li>运动</li>
            </ul>
        </h2>
        <div class="tabBox">
            <div class="col-item-main bd">
                <div class="item-main-con">
                    <ul class="com-dise-list">
                        <li>
                            <div class="col-sex-part clr ml ">
                                <div class="mix-two-pic">
                                    <a href="https://m.fh21.com.cn/jibing/view/5235238.html"
                                       class="mix-two-pic-link img-page-link">
                                        <img src="https://file.fh21static.com/fhfile1/M00/59/D4/oYYBAFm_M0mAOGwLAADiAoKp3V069.jpeg"
                                             alt="">
                                    </a>
                                </div>
                                <dl>
                                    <dt class="mix-two-title">
                                        <a href="https://m.fh21.com.cn/jibing/view/5235238.html" class="mix-info-link">
                                            <span>尖锐湿疣的饮食禁忌</span>
                                        </a>
                                    </dt>
                                    <dd class="mix-two-intro clr">
                                        <time class="time-hot-info pl">
                                            <span>2017-09-18</span>
                                            <span>4881人浏览</span>
                                        </time>
                                    </dd>
                                </dl>
                            </div>
                        </li>

                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/517367.html" class="com-dise-list-link">
                                <span class="com-dise-list-txt">尖锐湿疣饮食护理</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/517360.html" class="com-dise-list-link">
                                <span class="com-dise-list-txt">尖锐湿疣饮食治疗法</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/517358.html" class="com-dise-list-link">
                                <span class="com-dise-list-txt">尖锐湿疣饮食需要注意什么</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/515792.html" class="com-dise-list-link">
                                <i class="com-dise-list-hot">热</i>
                                <span class="com-dise-list-txt">尖锐湿疣病人应该吃什么</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/511865.html" class="com-dise-list-link">
                                <i class="com-dise-list-hot">热</i>
                                <span class="com-dise-list-txt">患者要最好尖锐湿疣的饮食护理</span>
                            </a>
                        </li>
                    </ul>
                    <a href="https://m.fh21.com.cn/jibing/list/8985/" class="btn-more">更多护理保健<i
                                class="btn-more-arrow"></i></a>
                </div>
                <div class="item-main-con">
                    <ul class="com-dise-list">
                        <li>
                            <div class="col-sex-part clr ml ">
                                <div class="mix-two-pic">
                                    <a href="https://m.fh21.com.cn/jibing/view/558944.html"
                                       class="mix-two-pic-link img-page-link">
                                        <img src="https://file.fh21.com.cn/fhfile1/M00/51/6D/ooYBAFkUMrCASaOwAAA5E2gKb8Q870.jpg"
                                             alt="">
                                    </a>
                                </div>
                                <dl>
                                    <dt class="mix-two-title">
                                        <a href="https://m.fh21.com.cn/jibing/view/558944.html" class="mix-info-link">
                                            <span>有尖锐湿疣疾病史可以怀孕吗</span>
                                        </a>
                                    </dt>
                                    <dd class="mix-two-intro clr">
                                        <time class="time-hot-info pl">
                                            <span>2016-03-10</span>
                                            <span>6617人浏览</span>
                                        </time>
                                    </dd>
                                </dl>
                            </div>
                        </li>

                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/522508.html" class="com-dise-list-link">
                                <span class="com-dise-list-txt">孕妇患上尖锐湿疣怎么办</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/522505.html" class="com-dise-list-link">
                                <span class="com-dise-list-txt">尖锐湿疣孕妇是否可以顺产</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/515985.html" class="com-dise-list-link">
                                <span class="com-dise-list-txt">尖锐湿疣影响生育吗？</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/512907.html" class="com-dise-list-link">
                                <i class="com-dise-list-hot">热</i>
                                <span class="com-dise-list-txt">孕妇得了尖锐湿疣怎么办</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/512525.html" class="com-dise-list-link">
                                <i class="com-dise-list-hot">热</i>
                                <span class="com-dise-list-txt">尖锐湿疣对婚孕的影响</span>
                            </a>
                        </li>
                    </ul>
                    <a href="https://m.fh21.com.cn/jibing/list/8987/" class="btn-more">更多护理保健<i
                                class="btn-more-arrow"></i></a>
                </div>
                <div class="item-main-con">
                    <ul class="com-dise-list">
                        <li>
                            <div class="col-sex-part clr ml ">
                                <div class="mix-two-pic">
                                    <a href="https://m.fh21.com.cn/jibing/view/522564.html"
                                       class="mix-two-pic-link img-page-link">
                                        <img src="https://file.fh21.com.cn/fhfile1/M00/51/77/o4YBAFkUOSCARBLAAABl6-f3vwU592.jpg"
                                             alt="">
                                    </a>
                                </div>
                                <dl>
                                    <dt class="mix-two-title">
                                        <a href="https://m.fh21.com.cn/jibing/view/522564.html" class="mix-info-link">
                                            <span>尖锐湿疣的护理方法有哪些</span>
                                        </a>
                                    </dt>
                                    <dd class="mix-two-intro clr">
                                        <time class="time-hot-info pl">
                                            <span>2016-01-12</span>
                                            <span>6738人浏览</span>
                                        </time>
                                    </dd>
                                </dl>
                            </div>
                        </li>

                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/516693.html" class="com-dise-list-link">
                                <span class="com-dise-list-txt">得了尖锐湿疣要注意什么</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/508948.html" class="com-dise-list-link">
                                <span class="com-dise-list-txt">得尖锐湿疣应注意哪些问题</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/508620.html" class="com-dise-list-link">
                                <span class="com-dise-list-txt">女性得尖锐湿疣应注意哪些问题</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/508053.html" class="com-dise-list-link">
                                <i class="com-dise-list-hot">热</i>
                                <span class="com-dise-list-txt">治疗尖锐湿疣的注意事项是哪些</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/502784.html" class="com-dise-list-link">
                                <i class="com-dise-list-hot">热</i>
                                <span class="com-dise-list-txt">发病期间尖锐湿疣应注意什么</span>
                            </a>
                        </li>
                    </ul>
                    <a href="https://m.fh21.com.cn/jibing/list/6303/" class="btn-more">更多护理保健<i
                                class="btn-more-arrow"></i></a>
                </div>
                <div class="item-main-con">
                    <ul class="com-dise-list">
                        <li>
                            <div class="col-sex-part clr ml ">
                                <div class="mix-two-pic">
                                    <a href="https://m.fh21.com.cn/jibing/view/522577.html"
                                       class="mix-two-pic-link img-page-link">
                                        <img src="https://file.fh21.com.cn/fhfile1/M00/51/75/ooYBAFkUOR-AOEIGAAD4xeOWNy0892.jpg"
                                             alt="">
                                    </a>
                                </div>
                                <dl>
                                    <dt class="mix-two-title">
                                        <a href="https://m.fh21.com.cn/jibing/view/522577.html" class="mix-info-link">
                                            <span>尖锐湿疣患者该如何运动</span>
                                        </a>
                                    </dt>
                                    <dd class="mix-two-intro clr">
                                        <time class="time-hot-info pl">
                                            <span>2016-01-12</span>
                                            <span>7152人浏览</span>
                                        </time>
                                    </dd>
                                </dl>
                            </div>
                        </li>

                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/519972.html" class="com-dise-list-link">
                                <span class="com-dise-list-txt">尖锐湿疣患者怎样运动</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/517607.html" class="com-dise-list-link">
                                <span class="com-dise-list-txt">尖锐湿疣患者的运动养生原则</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/515370.html" class="com-dise-list-link">
                                <span class="com-dise-list-txt">患上尖锐湿疣怎么锻炼</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/515357.html" class="com-dise-list-link">
                                <i class="com-dise-list-hot">热</i>
                                <span class="com-dise-list-txt">预防尖锐湿疣复发需提高免疫力</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/515349.html" class="com-dise-list-link">
                                <i class="com-dise-list-hot">热</i>
                                <span class="com-dise-list-txt">适量运动可抵抗尖锐湿疣再复发</span>
                            </a>
                        </li>
                    </ul>
                    <a href="https://m.fh21.com.cn/jibing/list/8986/" class="btn-more">更多护理保健<i
                                class="btn-more-arrow"></i></a>
                </div>
            </div>
        </div>
    </section>    <!--/.护理保健-->

    <!--.就诊指南-->
    <section class="wrap-box mtop" id="leftTabBox7">
        <h2>
            <span class="related-title">就诊指南</span>
            <ul class="dise-tab-item hd">
                <li>医院</li>
                <li>费用</li>
            </ul>
        </h2>
        <div class="tabBox">
            <div class="col-item-main bd">
                <div class="item-main-con">
                    <ul class="com-dise-list">
                        <li>
                            <div class="col-sex-part clr ml ">
                                <div class="mix-two-pic">
                                    <a href="https://m.fh21.com.cn/jibing/view/519983.html"
                                       class="mix-two-pic-link img-page-link">
                                        <img src="http://file.fh21.com.cn/fhfile1/M00/50/91/o4YBAFkLfk6AD2WOAAtz20h1vWs057_260x195.png"
                                             alt="">
                                    </a>
                                </div>
                                <dl>
                                    <dt class="mix-two-title">
                                        <a href="https://m.fh21.com.cn/jibing/view/519983.html" class="mix-info-link">
                                            <span>尖锐湿疣医院哪家比较有名</span>
                                        </a>
                                    </dt>
                                    <dd class="mix-two-intro clr">
                                        <time class="time-hot-info pl">
                                            <span>2016-01-07</span>
                                            <span>8185人浏览</span>
                                        </time>
                                    </dd>
                                </dl>
                            </div>
                        </li>

                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/519983.html" class="com-dise-list-link">
                                <span class="com-dise-list-txt">尖锐湿疣医院哪家比较有名</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/519982.html" class="com-dise-list-link">
                                <span class="com-dise-list-txt">尖锐湿疣医院哪家最有名</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/519981.html" class="com-dise-list-link">
                                <span class="com-dise-list-txt">尖锐湿疣医院哪家疗效好呢</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/518331.html" class="com-dise-list-link">
                                <i class="com-dise-list-hot">热</i>
                                <span class="com-dise-list-txt">尖锐湿疣医院哪家比较权威</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/517343.html" class="com-dise-list-link">
                                <i class="com-dise-list-hot">热</i>
                                <span class="com-dise-list-txt">北京专治尖锐湿疣医院</span>
                            </a>
                        </li>
                    </ul>
                    <a href="https://m.fh21.com.cn/jibing/list/8945/" class="btn-more">更多就诊指南<i
                                class="btn-more-arrow"></i></a>
                </div>
                <div class="item-main-con">
                    <ul class="com-dise-list">
                        <li>
                            <div class="col-sex-part clr ml ">
                                <div class="mix-two-pic">
                                    <a href="https://m.fh21.com.cn/jibing/view/508203.html"
                                       class="mix-two-pic-link img-page-link">
                                        <img src="http://file.fh21.com.cn/fhfile1/M00/50/98/o4YBAFkLhj6AdqPdAAFNXVENAMM359_260x195.jpg"
                                             alt="">
                                    </a>
                                </div>
                                <dl>
                                    <dt class="mix-two-title">
                                        <a href="https://m.fh21.com.cn/jibing/view/508203.html" class="mix-info-link">
                                            <span>淄博治湿疣要多少钱</span>
                                        </a>
                                    </dt>
                                    <dd class="mix-two-intro clr">
                                        <time class="time-hot-info pl">
                                            <span>2015-12-24</span>
                                            <span>6278人浏览</span>
                                        </time>
                                    </dd>
                                </dl>
                            </div>
                        </li>

                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/508203.html" class="com-dise-list-link">
                                <span class="com-dise-list-txt">淄博治湿疣要多少钱</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/508147.html" class="com-dise-list-link">
                                <span class="com-dise-list-txt">北京治疗湿疣要多少钱</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/507246.html" class="com-dise-list-link">
                                <span class="com-dise-list-txt">治疗慢性湿疣要多少钱</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/507229.html" class="com-dise-list-link">
                                <i class="com-dise-list-hot">热</i>
                                <span class="com-dise-list-txt">医尖锐湿疣要多少钱</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://m.fh21.com.cn/jibing/view/507219.html" class="com-dise-list-link">
                                <i class="com-dise-list-hot">热</i>
                                <span class="com-dise-list-txt">男性尖锐湿疣多少钱</span>
                            </a>
                        </li>
                    </ul>
                    <a href="https://m.fh21.com.cn/jibing/list/7303/" class="btn-more">更多就诊指南<i
                                class="btn-more-arrow"></i></a>
                </div>

            </div>
        </div>
    </section>    <!--/.就诊指南-->

    <!--底部-->
    <footer class="footer">
        <div class="footer-link-gray-box">
            <a class="footer-link-gray" href="javascript:void(0)">招贤纳士</a>
            <a class="footer-link-gray" href="javascript:void(0)">意见反馈</a>
            <a class="footer-link-gray" href="javascript:void(0)">联系我们</a>
        </div>
        <div class="footer-text">
            Copyright © 2000-2017 Yinanbin All rights reserved
        </div>
    </footer>

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

</div>

</body>
</html>
