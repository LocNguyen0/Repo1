<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\News;

class CommentController extends Controller
{
    public function store(Request $request, News $news)
    {
        $request->validate([
            'content' => 'required'
        ]);

        Comment::create([
            'content' => $request->content,
            'news_id' => $news->id,
            'user_id' => auth()->id()
        ]);

        return back();
    }
}
