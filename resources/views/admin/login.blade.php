<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{env("APP_NAME")}}-后台管理</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/zui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/style.css')}}">

    <script type="text/javascript" src="{{asset('admin/lib/jquery/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/js/zui.js')}}"></script>
</head>
<body class="login">
<div class="container ">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">{{env("APP_NAME")}}-后台管理</div>

                <div class="panel-body">
                    @include('shared._errors')
                    @include('shared._messages')
                    <form class="form-horizontal" method="POST" action=" {{ route('admin.login') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">用户名</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">密码</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 记住我
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    登录
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>