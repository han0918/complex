@extends('layouts.admin_base')
@section('content')
    <div class="tit">
        <h3><a href="{{route('categroy.index')}}">{{$categroy->name}}</a> <img src="/images/zhi.png" width="15px">分类信息</h3>
    </div>
    <div class="panel">
        <div class="panel-body ">
            <form class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-2 text-right">分类名称</label>
                    <div class="col-md-6 col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" placeholder="分类名称" datatype="*1-20" nullmsg="请填写分类名称！" value="{{$subclass->name}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 text-right">分类属性</label>
                    <div class="col-md-6 col-sm-10">
                        <select name="type" id="type"  class="selectpicker show-tick form-control" data-live-search="true">
                            @if(isset($attributes)&&count($attributes))
                                @foreach($attributes as $item)
                                    @if($item->id == $subclass->type)
                                        <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                    @else
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 text-right">关键词</label>
                    <div class="col-md-6 col-sm-10">
                        <textarea class="form-control" name="keyword" id="keyword" rows="3" placeholder="关键词" datatype="*" nullmsg="请填写关键词！">{{$subclass->keyword}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 text-right">关键词内容</label>
                    <div class="col-md-6 col-sm-10">
                        <textarea class="form-control" name="contents" id="content" rows="5" placeholder="关键词内容" datatype="*" nullmsg="请填写关键词内容！">{{$subclass->content}}</textarea>
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
                url:'{{route('subclass.put',['subclass'=>$subclass])}}',
                data:$('.form-horizontal').serialize(),
                type:"POST",
                dataType:'json',
                success:function (res) {
                    if(res.status){
                        self.location = document.referrer
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