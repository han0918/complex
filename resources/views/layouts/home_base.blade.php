<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="keywords" content="@yield('keywords')">
    <meta name="description" content="@yield('description')">
    <meta name="ip-enabled" content="true"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="format-detection" content="telephone=no,email=no">
    <meta name="applicable-device" content="mobile">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <script src="{{asset('/js/TouchSlide.1.1.js')}}"></script>
    <script src="{{asset('/js/zepto.min.js')}}"></script>
    <script src="{{asset('/js/dise.js')}}"></script>
</head>
<body>
    @yield('content')

    <!--底部-->
    <footer class="footer">
        <div class="footer-link-gray-box">
            <a class="footer-link-gray" href="{{session('setting.lurl')}}">{{session('setting.left')}}</a>
            <a class="footer-link-gray" href="{{session('setting.curl')}}">{{session('setting.center')}}</a>
            <a class="footer-link-gray" href="{{session('setting.rurl')}}">{{session('setting.right')}}</a>
        </div>
        <div class="footer-text">{{session('setting.copyright')}}</div>
    </footer>
</body>
</html>