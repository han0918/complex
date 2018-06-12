<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Categroy;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::leftjoin('categroys','articles.categroy_id','=','categroys.id')
            ->select('articles.*','categroys.id as cid','parent_id','categroys.name')->get();
        foreach ($article as $item){
            $fname = Categroy::where('id',$item->parent_id)->value('name');
            $item->fname = $fname;
        }

        return view('admin.article_list',['article'=>$article]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Article $article)
    {
        $categroys = Categroy::where('parent_id',0)->get();
        $first = $categroys->first();
        $subclass = Categroy::select('id','name')->where('parent_id',$first->id)->get();
        return view('admin.article_put',['article'=>$article,'categroys'=>$categroys,'subclass'=>$subclass]);
    }

    public function subclass(Request $request)
    {
        $categroy = Categroy::find($request->id);
        $subclass = Categroy::select('id','name')->where('parent_id',$categroy->id)->get();
        return response()->json(['code' => '1','msg' => '获取成功','subclass'=>$subclass]);
    }

    public function put(Request $request,Article $article)
    {
        if($request->title != $article->title){
            $article_id = Article::where('title',$request->title)->where('categroy_id',$request->categroy_id)->value('id');
            if(!empty($article_id)){
                return   show_res(0,'文章标题不能重复');
            }
        }
        $article->title = $request->title;
        $article->content = $request->content;
        $article->type = empty($request->type) ? 0 : $request->type;
        $article->images = $request->images;
        $article->categroy_id = $request->categroy_id;
        $article->state = empty($request->state) ? 0 : $request->state;
        if($article->save()){
            return   show_res(1,'success',route('article.index'));
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
//    public function show($id)
//    {
//
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $slectsub = Categroy::select('id','parent_id', 'name')->where('id', $article->categroy_id)->first();
        $slectcat = Categroy::select('id', 'name')->where('id', $slectsub->parent_id)->first();
        $categroys = Categroy::where('parent_id', 0)->get();
        return view('admin.article_put', ['article' => $article, 'categroys' => $categroys, 'slectsub' => $slectsub, 'slectcat' => $slectcat]);

    }

    public function del(Request $request)
    {
        $bool = Article::destroy($request->id);
        if($bool){
            return   show_res(1,'success');
        }else{
            return   show_res(0,'删除失败');
        }
    }

    public function setstate(Request $request){
        $article = Article::find($request->id);
        if($article->state == 0){
            $article->state = 1;
        }elseif($article->state == 1){
            $article->state = 0;
        }
        $article->save();
        return response()->json(['code' => '1','msg' => '修改成功','state'=>$article->state]);
    }

    public function settype(Request $request){
        $article = Article::find($request->id);
        if($article->type == 0){
            $article->type = 1;
        }elseif($article->type == 1){
            $article->type = 0;
        }
        $article->save();
        return response()->json(['code' => '1','msg' => '修改成功','type'=>$article->type]);
    }

}
