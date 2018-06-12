<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\College;
use App\Models\Attribute;
use App\Models\Categroy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubclassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categroy = Categroy::find($request->id);
        $subclass = $categroy->categroy;
        session()->put('categroy_id',$categroy->id);
        $attributes = $categroy->attributes;
        return view('admin.categroy_subclass',['categroy'=>$categroy,'attributes'=>$attributes,'subclass'=>$subclass]);
    }


    public function put(Request $request,Categroy $subclass)
    {
        if($request->name !=$subclass->name){
            $categroy_id = Categroy::where('name',$request->name)->where('parent_id',session('categroy_id'))->value('id');
            if(!empty($categroy_id)){
                return   show_res(0,'您已添加了该分类');
            }
        }
        $subclass->name = $request->name;
        $subclass->keyword = $request->keyword;
        $subclass->type = $request->type;
        $subclass->content = $request->contents;
        $subclass->parent_id = session('categroy_id');
        if($subclass->save()){
            return   show_res(1,'success',route('categroy.index'));
        }else{
            return   show_res(0,'更新失败');
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subclass = Categroy::find($id);
        $categroy = Categroy::where('id',$subclass->parent_id)->first();
        session()->put('categroy_id',$categroy->id);
        $attributes = $categroy->attributes;
        return view('admin.categroy_subclass',['subclass'=>$subclass,'categroy'=>$categroy,'attributes'=>$attributes]);
    }

    public function del(Request $request)
    {
        $bool = Categroy::destroy($request->id);
        if($bool){
            return   show_res(1,'success');
        }else{
            return   show_res(0,'删除失败');
        }
    }

    public function setstate(Request $request){
        $categroy = Categroy::find($request->id);
        if($categroy->state == 0){
            $categroy->state = 1;
        }elseif($categroy->state == 1){
            $categroy->state = 0;
        }
        $categroy->save();
        return response()->json(['code' => '1','msg' => '修改成功','state'=>$categroy->state]);
    }

}
