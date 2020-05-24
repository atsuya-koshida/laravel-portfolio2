<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    public function store(Request $request, Comment $comment)
    {
        $comment->fill($request->all());
        $post = $comment->post_id;
        $comment->save();
        return redirect()->route('post.show', ['post' => $post]);
    }
}