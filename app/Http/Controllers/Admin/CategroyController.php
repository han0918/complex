<?php

namespace App\Http\Controllers\Admin;

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
        return view('admin.categroy_list');
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Categroy $categroy)
    {
        $categroy_id = Categroy::where('name',$request->name)->value('id');
        if(!empty($categroy_id)){
            return   show_res(0,'您已添加了该分类');
        }
        $categroy->name = $request->name;
        $categroy->images = $request->images;
        if($categroy->save()){
            return   show_res(1,'success',route('categroy.index'));
        }else{
            return   show_res(0,'添加失败');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article_categroy  $article_categroy
     * @return \Illuminate\Http\Response
     */
    public function show(Categroy $article_categroy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article_categroy  $article_categroy
     * @return \Illuminate\Http\Response
     */
    public function edit(Categroy $article_categroy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article_categroy  $article_categroy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categroy $article_categroy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article_categroy  $article_categroy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categroy $article_categroy)
    {
        //
    }
}
