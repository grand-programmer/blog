<?php

namespace App\Http\Controllers;

use App\Article;
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
            DB::transaction(function () use ($article) {
                $article->like()->updateOrCreate(
                    [
                        'liked' => $article->like_count + 1,
                    ]
                );
            }, 5);

            return response()->json($article->like_count);
        }
    }

    public function saveView(Article $article, Request $request)
    {
        if ($request->ajax()) {
            DB::transaction(function () use ($article) {
                $article->view()->updateOrCreate(
                    [
                        'viewed' => $article->view_count + 1,
                    ]
                );
            }, 5);

            return response()->json($article->view_count);
        }
    }


}
