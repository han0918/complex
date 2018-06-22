<?php

namespace App\Http\Controllers\Home;

use App\Models\Categroy;
use App\Models\Article;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        session()->put('setting',$setting);
        $categroy = Categroy::where('parent_id',0)->simplePaginate(8);
        return view('home.home',['categroy'=>$categroy]);
    }

    public function categroy(Categroy $categroy)
    {
        $attribute = $categroy->attributes;
        $subclass = Categroy::where('parent_id',$categroy->id)->with('articles')->get();
        session()->put('subclass',$subclass);
        $first = $subclass->first();
        $top = Article::where('categroy_id',$first->id)->first();
        $commend = $subclass->where('state',1)->slice(0,3);
        foreach ($commend as $item){
            $item->title = $item->articles()->value('title');
        }
        foreach ($subclass as $item){
            $res = $item->articles()->select('id','title')->where('state',1)->where('categroy_id',$item->id)->limit(10)->get();
            $item->article = $res;
        }
        foreach ($attribute as $item){
            $result = $item->categroys()->select('id','name')->get();
            foreach ($result as $obj){
                $subarticle = $obj->articles;
                $obj->subarticle = $subarticle;
            }
            $item->article = $result;
        }
        return view('home.categroy',['subclass'=>$subclass,'categroy'=>$categroy,'top'=>$top,'commend'=>$commend,'attribute'=>$attribute]);
    }


    public function subclass(Categroy $categroy)
    {
        $top = $categroy->articles()->where('type',1)->limit(3)->get();
        $article = $categroy->articles()->where('type',0)->simplePaginate(15);
        return view('home.subclass',['top'=>$top,'article'=>$article,'categroy'=>$categroy]);
    }

    public function article(Article $article)
    {
        $prevarticle = Article::where('id',($article->id-1))->first();
        $nextarticle = Article::where('id',($article->id+1))->first();
        $categroy = Categroy::where('id',$article->categroy_id)->first();
        $randarticle = Article::inRandomOrder()->take(6)->get();
        $commendarticle = Article::where('state',1)->limit(10)->get();
        return view('home.article',['article'=>$article,'categroy'=>$categroy,'prevarticle'=>$prevarticle,'nextarticle'=>$nextarticle,'randarticle'=>$randarticle,'commendarticle'=>$commendarticle]);
    }

}
