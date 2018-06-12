@extends('layouts.admin_base')
@section('top')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
@endsection

@section('content')
    <div class="tit">
        @if(isset($categroy)&&count($categroy))
            <h3><a href="{{route('categroy.index')}}">{{$categroy->name}}</a> <img src="/images/zhi.png" width="15px">分类信息</h3>
        @else
            <h3>分类信息</h3>
        @endif

    </div>
    <div class="panel">
        <div class="panel-body ">
            <form class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-2 text-right">属性名称</label>
                    <div class="col-md-6 col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" placeholder="属性名称" datatype="*1-20" nullmsg="请填写属性名称！" value="{{$attribute->name}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 text-right">分类名称</label>
                    <div class="col-sm-6">
                        <select name="categroy_id" id="categroy_id"  class="selectpicker show-tick form-control" data-live-search="true">
                            @if(isset($categroy)&&count($categroy))
                                <option value="{{$categroy->id}}">{{$categroy->name}}</option>
                            @endif
                            @if(isset($categroys)&&count($categroys))
                                @foreach($categroys as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            @endif
                        </select>
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
                url:'{{route('attribute.add',['attribute'=>$attribute])}}',
                data:$('.form-horizontal').serialize(),
                type:"POST",
                dataType:'json',
                success:function (res) {
                    if(res.status){
                        self.location = document.referrer;
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