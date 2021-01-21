<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $latestArticles = Article::latest()->limit(6)->get();

        return view('components.index', compact('latestArticles'));
    }

    public function saveComment(Request $request)
    {
        $validation = $request->validate([
            'title' => 'required|max:255',
            'text'  => 'required'
        ]);
        $data       = $request->only(['title', 'text']);
        $comment    = Comment::create($data);
        if ($comment) {
            return response()->json('Successfully added!');
        }


    }


}
