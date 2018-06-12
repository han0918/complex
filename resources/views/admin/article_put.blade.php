@extends('layouts.admin_base')
@section('top')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    @include('UEditor::head')
@endsection
@section('content')
    <div class="tit">
        <h3>文章信息</h3>
    </div>

    <div class="panel" style="overflow: hidden;">
        <div class="panel-body " style="overflow: hidden;">
            <form class="form-horizontal" id="edit" onsubmit="return false">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-sm-1 text-left">标题</label>
                    <div class="col-md-6 col-sm-10">
                        <input type="text" class="form-control" name="title" id="title" placeholder="标题" datatype="*" nullmsg="请填写标题！" value="{{$article->title or ''}}" >
                    </div>
                </div>

                <div class="form-group">
                    <label  class="col-sm-1 text-left">头条</label>
                    <div class="col-md-10 col-sm-10">
                        <div class="switch">
                            <input type="checkbox" name="type" value="1"  {{$article->type==1?'checked':''}}>
                            <label  >　</label>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="form-group">
                    <label  class="col-sm-1 text-left">推荐</label>
                    <div class="col-md-10 col-sm-10">
                        <div class="switch">
                            <input type="checkbox" name="state"  value="1"  {{$article->state==1?'checked':''}}>
                            <label  >　</label>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="form-group">
                    <label class="col-sm-1 text-left">分类</label>
                    <div class="col-md-6 col-sm-10">
                        <div class="col-md-5 col-sm-5">
                            <select name="parent_id" id="parent_id"  class="selectpicker show-tick form-control" data-live-search="true" datatype="*">
                                @if(isset($slectcat)&&count($slectcat))
                                    <option value="{{$slectcat->id}}">{{$slectcat->name}}</option>
                                @endif
                                @if(isset($categroys)&&count($categroys))
                                    @foreach($categroys as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-1 col-sm-1">___</div>
                        <div class="col-md-5 col-sm-5">
                            <select name="categroy_id" id="categroy_id"  class="selectpicker show-tick form-control" data-live-search="true" datatype="*">
                                @if(isset($slectsub)&&count($slectsub))
                                    <option value="{{$slectsub->id}}">{{$slectsub->name}}</option>
                                @endif
                                @if(isset($subclass)&&count($subclass))
                                    @foreach($subclass as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                    </div>
                </div>
                <br/>
                <div class="form-group">
                    <label  class="col-sm-1 text-left">内容</label>
                    <div class="col-md-10 col-sm-10">
                        <textarea name="content" id="content" datatype="*">{{$article->content or ''}}</textarea>

                    </div>
                </div>
                <input type="hidden" id="img" name="images"/>
                <div class="form-group">
                    <div class="col-sm-offset-1 col-sm-10">
                        <button type="submit" class="btn btn-danger" id="ok_btn" >确定</button>
                        <button type="button" class="btn " onclick="window.history.go(-1);">取消</button>
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
        var ue = UE.getEditor('content',{
            initialFrameHeight:300,
        });
        ue.ready(function() {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
        });

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
            var preg = /<img.*?(?:>|\/>)/gi;
            var content = ue.getContent();
            var srcReg = /src=[\'\"]?([^\'\"]*)[\'\"]?/i;
            var arr = content.match(preg);
            if(arr) {
                for (var i = 0; i < arr.length; i++) {
                    var src = arr[i].match(srcReg);
                }
            }

            if(src) $('#img').val(src[1]);
            $('textarea[name="content"]').val(content);
            var data=$("#edit").serialize();

            $.ajax({
                url:'{{route('article.put',['article'=>$article])}}',
                data: data,
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


        $("#parent_id").change(function(){
            $.post('{{route('article.subclass')}}',{id:$(this).val()},function(res){
                if(res.code){
                    $("#categroy_id").selectpicker('destroy');
                    $("#categroy_id").empty();
                    var count = res.subclass.length;
                    var b="";
                    for(i=0;i<count;i++){
                        b+="<option value='"+res.subclass[i].id+"'>"+res.subclass[i].name+"</option>";
                    }
                    $("#categroy_id").append(b);
                    $("#categroy_id").selectpicker('show');

                }
            })
        });
    </script>
@endsection