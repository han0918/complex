<?php

namespace App\Http\Controllers\Home;

use App\Models\Categroy;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $categroy = Categroy::where('parent_id',0)->simplePaginate(8);
        return view('home.home',['categroy'=>$categroy]);
    }

    public function categroy(Categroy $categroy,Article $article)
    {
        $attribute = $categroy->attributes;
        $subclass = Categroy::where('parent_id',$categroy->id)->get();
        $first = $subclass->first();
        $top = Article::where('categroy_id',$first->id)->first();
        foreach ($subclass as $item){
            $commend = Article::select('id','title')->where('state',1)->where('categroy_id',$item->id)->get();
            $item->article = $commend;
        }
        return view('home.categroy',['subclass'=>$subclass,'categroy'=>$categroy,'top'=>$top]);
    }
}
