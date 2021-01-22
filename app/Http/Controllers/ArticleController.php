<?php

namespace App\Http\Controllers;

use App\Article;
use App\Jobs\Likes;
use App\Jobs\Viewes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with('tags')->paginate(10);

        return view('article.index', compact('articles'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Article $article
     *
     * @return \Illuminate\Http\Response
     */
    public function show($article)
    {
        $article = Article::where(['slug' => $article])->with('tags')->first();

        return view('article.show', compact('article'));
    }

    public function saveLike(Article $article, Request $request)
    {
        if ($request->ajax()) {
            $count=$article->like_count;
            Likes::dispatchNow($article);
            return response()->json($count+1);
        }
    }

    public function saveView(Article $article, Request $request)
    {
        if ($request->ajax()) {
            $count=$article->view_count;
            Viewes::dispatchNow($article);
            return response()->json($count+1);
        }
    }


}
