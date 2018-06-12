@extends('layouts.admin_base')
@section('content')
    <div class="tit">
        <h3>管理员信息</h3>
    </div>

    <div class="panel">
        <div class="panel-body ">
            <form class="form-horizontal">

                <div class="form-group">
                    <label class="col-sm-2 text-right">网站名称</label>
                    <div class="col-md-6 col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" placeholder="网站名称" datatype="*" nullmsg="请填写网站名称！" value="{{$setting->name or ''}}" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 text-right">底部左侧</label>
                    <div class="col-md-6 col-sm-10">
                        <input type="text" class="form-control" name="left" id="left" placeholder="底部左侧名称" datatype="*" nullmsg="请填写底部左侧名称！" value="{{$setting->left or ''}}" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 text-right">底部左侧地址</label>
                    <div class="col-md-6 col-sm-10">
                        <input type="text" class="form-control" name="lurl" id="lurl" placeholder="底部左侧地址" datatype="*" nullmsg="请填写底部左侧地址！" value="{{$setting->lurl or ''}}" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 text-right">底部中间</label>
                    <div class="col-md-6 col-sm-10">
                        <input type="text" class="form-control" name="center" id="center" placeholder="底部中间名称" datatype="*" nullmsg="请填写底部中间名称！" value="{{$setting->center or ''}}" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 text-right">底部中间地址</label>
                    <div class="col-md-6 col-sm-10">
                        <input type="text" class="form-control" name="curl" id="curl" placeholder="底部中间地址" datatype="*" nullmsg="请填写底部中间地址！" value="{{$setting->curl or ''}}" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 text-right">底部右侧</label>
                    <div class="col-md-6 col-sm-10">
                        <input type="text" class="form-control" name="right" id="right" placeholder="底部右侧名称" datatype="*" nullmsg="请填写底部右侧名称！" value="{{$setting->right or ''}}" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 text-right">底部右侧地址</label>
                    <div class="col-md-6 col-sm-10">
                        <input type="text" class="form-control" name="rurl" id="rurl" placeholder="底部右侧地址" datatype="*" nullmsg="请填写底部右侧地址！" value="{{$setting->rurl or ''}}" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 text-right">版权所有</label>
                    <div class="col-md-6 col-sm-10">
                        <input type="text" class="form-control" name="copyright" id="copyright" placeholder="版权所有" datatype="*" nullmsg="请填写底部右侧地址！" value="{{$setting->copyright or ''}}" >
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
                url:'{{route('setting.put',['setting'=>$setting])}}',
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