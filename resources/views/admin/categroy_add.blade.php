@extends('layouts.admin_base')
@section('content')
    <div class="tit">
        <h3>分类信息</h3>
    </div>
    <div class="panel">
        <div class="panel-body ">
            <form class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-2 text-right">分类名称</label>
                    <div class="col-md-6 col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" placeholder="分类名称" datatype="*1-20" nullmsg="请填写分类名称！" value="{{$categroy->name}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 text-right">封面图片 </label>

                    <div class="col-md-6 col-sm-10">
                        <input type="hidden" class="form-control" name="images" id="img" placeholder=""  datatype="*" nullmsg="请上传封面图片！" value="{{$categroy->images}}" >

                        <input type="file" id="inputfile" style="height:0;width:0;z-index: -1; position: absolute;left: 10px;top: 5px;" value=""/>
                        <div>
                            <img id="imghead" width=120 height=auto border=0 src=
                            @if(empty($categroy->images))
                                    /images/pho.jpg
                                 @else
                                 {{$categroy->images}}
                                 @endif
                                 style="padding: 5px;" onclick="getElementById('inputfile').click()">
                            <p class="help-block">  </p>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 text-right">关键词</label>
                    <div class="col-md-6 col-sm-10">
                        <textarea class="form-control" name="keyword" id="keyword" rows="3" placeholder="关键词" datatype="*" nullmsg="请填写关键词！">{{$categroy->keyword}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 text-right">关键词内容</label>
                    <div class="col-md-6 col-sm-10">
                        <textarea class="form-control" name="contents" id="content" rows="5" placeholder="关键词内容" datatype="*" nullmsg="请填写关键词内容！">{{$categroy->content}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-danger" id="ok_btn" >确定</button>&nbsp;&nbsp;
                        <button type="submit" class="btn " onclick="window.history.go(-1);">取消</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection

@section('foot')
    <script>

        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' } });
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
                url:'{{route('categroy.add',['categroy'=>$categroy])}}',
                data:$('.form-horizontal').serialize(),
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

        //上传图片
        $('#inputfile').change(function(){

            //创建FormData对象
            var data = new FormData();
            //为FormData对象添加数据
            $.each($('#inputfile')[0].files, function (i, file) {
                data.append('upload_file' + i, file);
            });
            $.ajax({
                type: "POST",
                url: '/uploadpic',
                dataType: 'json',
                cache: false,
                contentType: false,		//不可缺参数
                processData: false,		//不可缺参数
                data:data,
                success: function(res) {

                    if(res.code == 0 ){
                        $('#imghead').attr("src", res.imgurl);
                        $('#img').val(res.imgurl);
                        $('#img').show();
                    }else if(res.code == 1 ){
                        layer.msg(res.msg,{offset:'c'})
                        return false;
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                }
            });
        })
    </script>
@endsection