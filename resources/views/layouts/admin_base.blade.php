<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{env("APP_NAME")}}-后台管理</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/zui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/style.css')}}">

    <script type="text/javascript" src="{{asset('admin/lib/jquery/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/js/zui.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/lib/layer/layer.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/lib/bootbox/bootbox.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/lib/validform/Validform_v5.3.2.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/lib/validform/Validform_Datatype.js')}}"></script>

    <script type="text/javascript" src="{{asset('admin/js/admin.js')}}"></script>
    @yield('top')

</head>
<body>

<div class="navbar">
    <div class="navbar-header">
        <a class="navbar-brand" href="javascript:;">后台管理</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
        <!--          <li class="active"><a href="#">帮助</a></li>-->
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon icon-user"></i>{{auth('admin')->user()->name}} <b class="caret"></b></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="#">
                    <form action="{{ route('admin.logout') }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
                    </form>
                </a></li>
            </ul>
        </li>
    </ul>
</div>

<div class="main">
    <div class="sidebar">
        <div class="sidebar-content">
            <nav class="menu" data-ride="menu"   id="menu" >
                <ul class="nav">

                    <li><a href="#"><i class="icon icon-file-text"></i> 管理员管理</a></li>
                    <li><a href="{{route('categroy.index')}}"><i class="icon icon-rocket"></i> 病类管理</a></li>
                    <li><a href="{{route("article.index")}}"><i class="icon icon-plane"></i> 文章管理</a></li>
                    <li><a href="#"><i class="icon icon-rocket"></i> 关键词管理</a></li>

                </ul>
            </nav>
        </div>
    </div>
    <div class="content">

        @yield('content')


    </div>

</div>
@yield('foot')
</body>
</html>