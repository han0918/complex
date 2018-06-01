@extends('layouts.admin_base')
@section('top')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/jquery.dataTables.css')}}">
@endsection

@section('content')
    <div class="tit">
        <h3>病类列表</h3>
    </div>

    <div class="pull-left" style="margin-right: 10px"><a href="{{route('categroy.create')}}" class="btn btn-danger">添加分类</a></div>
    <div class="pull-left" style="margin-bottom: 10px"><a href="{{route('categroy.create')}}" class="btn btn-primary">添加属性</a></div>
    <table class="table table-bordered table-hover table-striped" id="list">
        <thead>
        <tr>
            <th>序号</th>
            <th>名称</th>
            <th>创建时间</th>
            <th width="140">操作</th>
        </tr>
        </thead>
        <tbody>
        @if((isset($categroy)&&count($categroy))>0)
            @foreach($categroy as $k=>$item)
                <tr>
                    <td >{{$item->id}}</td>
                    <td >{{$item->name}}</td>
                    <td >{{$item->created_at}}</td>
                    <td >
                        <a href="{{route('categroy.subclass',['id' => $item->id])}}" class="btn btn-sm btn-primary"><i class="icon-plus"></i></a>
                        <a href="{{route('categroy.edit',['id' => $item->id])}}" class="btn btn-sm btn-success"><i class="icon-edit"></i></a>
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
                url:'{{route('categroy.del')}}',
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