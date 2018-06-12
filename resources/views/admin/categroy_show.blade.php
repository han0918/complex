@extends('layouts.admin_base')
@section('top')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/jquery.dataTables.css')}}">
@endsection

@section('content')
    <div class="tit">
        <h3><a href="{{route('categroy.index')}}">{{$categroy->name}}</a> <img src="/images/zhi.png" width="15px">下级分类</h3>
    </div>
    <div class="pull-right" style="margin-right: 10px"><a href="{{route('subclass.create',['id' => $categroy->id])}}" class="btn btn-sm btn-danger">添加分类</a></div>
    <table class="table table-bordered table-hover table-striped" id="list">
        <thead>
        <tr>
            <th>序号</th>
            <th>名称</th>
            <th>关联属性</th>
            <th>首页推荐</th>
            <th>创建时间</th>
            <th width="140">操作</th>
        </tr>
        </thead>
        <tbody>
        @if((isset($categroys)&&count($categroys))>0)
            @foreach($categroys as $item)
                <tr>
                    <td >{{$item->id}}</td>
                    <td >{{$item->name}}</td>
                    <td >
                        @if((isset($item->attribute)&&count($item->attribute))>0)
                            {{$item->attribute->name}}
                        @else
                            暂无属性
                        @endif

                    </td>
                    <td>
                        @if($item->state)
                            <button type="button" class="btn btn-sm btn-success" onclick="setstate({{$item->id}},this)"><i class="icon icon-check"></i></button>
                        @else
                            <button type="button" class="btn btn-sm btn-danger" onclick="setstate({{$item->id}},this)"><i class="icon icon-times"></i></button>
                        @endif
                    </td>
                    <td >{{$item->created_at}}</td>
                    <td >
                        <a href="{{route('subclass.edit',['id' => $item->id])}}" class="btn btn-sm btn-success"><i class="icon-edit"></i></a>
                        <button type="button" class="btn btn-sm btn-danger" onclick="del(function(){ _del({{$item->id}}); })"><i class="icon-trash"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif


        </tbody>

    </table>
@endsection
@section('foot')
    <script type="text/javascript" src="{{asset('admin/js/jquery.dataTables.js')}}"></script>
    <script>
        function _del(uid){

            $.ajax({
                url:'{{route('subclass.del')}}',
                data:{'_token':'{{ csrf_token()}}',id:uid},
                type:"POST",
                dataType:'json',
                success:function (res) {
                    if(res.status){
                        window.location.reload();
                    }
                },
                error: function(data){
                    // Error...


                }
            });
        }

        function setstate(uid,obj){
            $.ajax({
                url:'{{route('subclass.setstate')}}',
                data:{'_token':'{{ csrf_token()}}',id:uid},
                type:"POST",
                dataType:'json',
                success:function (res) {
                    if(res.code){
                        if(res.state){
                            $(obj).removeClass('btn-danger')
                            $(obj).addClass('btn-success')
                            $(obj).html('<i class="icon icon-check"></i>')
                        }else{
                            $(obj).removeClass('btn-success')
                            $(obj).addClass('btn-danger')
                            $(obj).html('<i class="icon icon-times"></i>')
                        }
                    }
                },
                error: function(data){
                    // Error...

                }
            });
        }


        $(document).ready(function() {
            $('#list').dataTable(
                {
                    "language": {
                        "url": "{{asset('admin/js/Chinese.json')}}"
                    },
                    "iDisplayLength" : 50, //默认显示的记录数
                    "order": [[ 0, 'desc' ]]

                }

            );
        } );

    </script>

@endsection