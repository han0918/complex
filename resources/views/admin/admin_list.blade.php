@extends('layouts.admin_base')
@section('content')
    <div class="tit">
        <h3>管理员管理</h3>
    </div>

    <div class="pull-right"><a href="{{route("admin.create",['id'=>''])}}" class="btn btn-danger">添加</a></div>
    <table class="table table-bordered table-hover table-striped">
        <thead>
        <tr>
            <th>序号</th>
            <th>用户名</th>
            <th>创建时间</th>
            <th width="140">操作</th>
        </tr>
        </thead>
        <tbody>
        @if((isset($admin)&&count($admin))>0)
            @foreach($admin as $item)
                <tr>
                    <td >{{$item->id}}</td>
                    <td >{{$item->name}}</td>
                    <td >{{$item->created_at}}</td>
                    <td >
                        <a href="{{route('admin.create',['id'=>$item->id])}}" class="btn btn-sm btn-success"><i class="icon-edit"></i></a>

                        <button type="button" class="btn btn-sm btn-danger" onclick="del(function(){ del_user({{$item->id}}); })"><i class="icon-trash"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>

    </table>
@endsection
@section('foot')

    <script>
        function del_user(uid){

            $.ajax({
                url:'{{route('admin.del')}}',
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

    </script>

@endsection