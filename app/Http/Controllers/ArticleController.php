<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function createArticle(){
        return view('article.createArticle');
    }

    public function articleIndex(){
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(8);
        return view('article.articleIndex', compact('articles'));
    }

    public function categoryShow(Category $category){
        $articles = $category->articles()->where('is_accepted', true)->paginate(8);
        return view('article.categoryShow', compact('articles','category'));
    }
    
    public function articleDet(Article $article){
        return view('article.articleDet', compact('article'));
    }
    
    public function articleCarousel(Article $article){
        $articles = Article::where('category_id', $article->category_id)
        ->where('id', '!=', $article->id)
        ->get();

        return view('article.articleDet', compact('article', 'articles'));
    }

    public function articleEdit(Article $article){
        return view ('article.articleEdit', compact('article'));
    }

    public function destroy(Article $article){
        $article->delete();
        return redirect('/article/index')->with('message', 'Articolo eliminato con successo.');
    }

        
    public function articleSearch(Request $request){
        $articles = Article::search($request->searched)->where('is_accepted', true)->paginate(8);

        return view('article.articleIndex', compact('articles'));
    }

}

