<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::all();
        return view('admin.admin_list',['admin'=>$admin]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Admin $admin)
    {
        return view('admin.admin_put',['admin'=>$admin]);
    }

    public function put(Request $request,Admin $admin)
    {
        $this->validate($request,[
            'name'=>'required|min:3|max:50',
            'password'=>'required|confirmed|min:6',
        ]);
        if($request->name != $admin->name){
            $admin_id = Admin::where('name',$request->name)->value('id');
            if(!empty($admin_id)){
                return show_res(0,'用户名已存在');
            }
        }
        $admin->name = $request->name;
        if(!empty($request->password)){
            $admin->password = bcrypt($request->password);
        }
        if($admin->save()){
            return show_res(1,'更新成功',route('admin.index'));
        }else{
            return show_res(0,'更新失败');
        }

    }


    public function del(Request $request)
    {
        $bool = Admin::destroy($request->id);
        if($bool){
            return show_res(1,'success');
        }else{
            return show_res(0,'删除失败');
        }
    }

}
