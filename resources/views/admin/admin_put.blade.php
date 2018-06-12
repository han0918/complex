@extends('layouts.admin_base')
@section('content')
    <div class="tit">
        <h3>管理员信息</h3>
    </div>

    <div class="panel">
        <div class="panel-body ">
            <form class="form-horizontal">

                <div class="form-group">
                    <label class="col-sm-2 text-right">用户名</label>
                    <div class="col-md-6 col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" placeholder="用户名" datatype="s" nullmsg="请填写用户名！" value="{{$admin->name}}" >
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-2 text-right">密码</label>
                    <div class="col-md-6 col-sm-10">
                        <input type="password" class="form-control" name="password" id="password"   nullmsg="请设置密码！" errormsg="密码范围在6~16位之间！" @if(!empty($admin->password)) placeholder="不填不作修改" @else placeholder="密码" datatype="*6-16"  @endif >
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-2 text-right">确认密码</label>
                    <div class="col-md-6 col-sm-10">
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="确认密码"  nullmsg="请再输入一次密码！" errormsg="您两次输入的账号密码不一致！" @if(!empty($admin->password))  @else datatype="*" recheck="password" @endif >
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-danger" id="ok_btn" >确定</button>
                        <button type="submit" class="btn " onclick="window.history.go(-1);">取消</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    </div>
@endsection

@section('foot')
    <script>
        $.ajaxSetup({headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }});
        $(function(){
            //$(".form-horizontal").Validform();  //就这一行代码！;

            $(".form-horizontal").Validform({
                tiptype:3,
                btnSubmit:"#ok_btn",
            });

            $(".form-horizontal").on("submit",function(){
                if($(".Validform_wrong").size()==0)
                {
                    // $("#ok_btn").attr("disabled","disabled");
                    checkInfo();
                }
                return false;
            });

        })
        function checkInfo(){

            $.ajax({
                url:'{{route('admin.put',['admin'=>$admin])}}',
                data:$(".form-horizontal").serialize(),
                type:"POST",
                dataType:'json',
                success:function (res) {
                    if(res.status){
                        go_to(res.data);
                    }
                    else {
                        nbalert(res.msg)
                    }
                },
                error: function(data){
                    erroralert(data);


                }
            });

        }
    </script>
@endsection