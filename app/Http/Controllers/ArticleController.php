<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;

class ArticleController extends Controller
{
    public function viewAllArticle()
    {
    	  $articles = Article::all();
    	  $categories = Category::where(['c_active'=>Category::STATUS_PUBLIC])->get();
    	  $viewData = [
    	  	'articles' =>$articles,
    	  	'categories' => $categories
    	  ];
    	  return view('article.home', $viewData);
    }


    public function show(Request $request)
    {
    	$url = $request->segment(2);
    	$url = preg_split('/(-)/i', $url);
    	
    	if($id = array_pop($url))
    	{
    		$categories = Category::where(['c_active'=>Category::STATUS_PUBLIC])->get();
    		$article_byID = Article::find($id);
    		$viewData = [
    		'categories'	=> $categories,
    		'article_byID'=>$article_byID,
    		];

    		return view('article.show', $viewData);
    	}
    	return redirect('/');
    }
}
