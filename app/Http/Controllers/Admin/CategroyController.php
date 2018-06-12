<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attribute;
use App\Models\Categroy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategroyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categroy = Categroy::where('parent_id',0)->get();
        foreach ($categroy as $item){
            $item->count = $item::where('parent_id',$item->id)->count('id');
            $dattribute = $item->attributes;
            $item->attribute = $dattribute;
        }
        return view('admin.categroy_list',['categroy'=>$categroy]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Categroy $categroy)
    {
        return view('admin.categroy_add',['categroy'=>$categroy]);
    }

    public function categroy_add(Request $request,Categroy $categroy)
    {
        if($request->name != $categroy->name){
            $categroy_id = Categroy::where('name',$request->name)->value('id');
            if(!empty($categroy_id)){
                return   show_res(0,'您已添加了该分类');
            }
        }
        $categroy->name = $request->name;
        $categroy->images = $request->images;
        $categroy->keyword = $request->keyword;
        $categroy->content = $request->contents;
        if($categroy->save()){
            return   show_res(1,'success',route('categroy.index'));
        }else{
            return   show_res(0,'更新失败');
        }
    }

    public function categroy_del(Request $request)
    {
        $categroy = Categroy::find($request->id);
        $categroy->unattribute();
        $bool = $categroy->delete();

        if($bool){
            return   show_res(1,'success');
        }else{
            return   show_res(0,'删除失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article_categroy  $article_categroy
     * @return \Illuminate\Http\Response
     */
    public function show(Categroy $categroy)
    {
        $categroys = Categroy::where('parent_id',$categroy->id)->get();
        foreach ($categroys as $item){
            $attributes = $item->attribute;
            $item->attribute = $attributes;
        }
        return view('admin.categroy_show',['categroys'=>$categroys,'categroy'=>$categroy]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article_categroy  $article_categroy
     * @return \Illuminate\Http\Response
     */
    public function edit(Categroy $categroy)
    {
        return view('admin.categroy_add',['categroy'=>$categroy]);
    }


}
