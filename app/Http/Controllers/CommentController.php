<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Request $request)
    {
        $comment = new Comment;

        $comment->comment = $request->comment;

        $comment->user()->associate($request->user());

        $comment->parent_id = $request->post_id;

        $post = Post::find($request->post_id);

        $post->comments()->save($comment);

        return back();
    }
//
}
