<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categroy;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Attribute $attribute)
    {
        $categroys = Categroy::where('parent_id',0)->get();
        return view('admin.attribute_add',['categroys'=>$categroys,'attribute'=>$attribute]);
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
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categroy = Categroy::find($id);
        $attribute = Attribute::where('categroy_id',$id)->get();
        return view('admin.attribute_show',['attribute'=>$attribute,'categroy'=>$categroy]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Attribute $attribute)
    {
        $categroy = Categroy::find($attribute->categroy_id);
        return view('admin.attribute_add',['categroy'=>$categroy,'attribute'=>$attribute]);
    }

    public function attribute_add(Request $request,Attribute $attribute)
    {
        if($request->name != $attribute->name){
            $attribute_id = Attribute::where('name',$request->name)->where('categroy_id',$request->categroy_id)->value('id');
            if(!empty($attribute_id)){
                return   show_res(0,'您已添加了该属性');
            }
        }
        $attribute->name = $request->name;
        $attribute->categroy_id = $request->categroy_id;
        if($attribute->save()){
            return   show_res(1,'success',route('categroy.index'));
        }else{
            return   show_res(0,'更新失败');
        }
    }

    public function attribute_del(Request $request)
    {
        $bool = Attribute::destroy($request->id);
        if($bool){
            return   show_res(1,'success');
        }else{
            return   show_res(0,'删除失败');
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

}
