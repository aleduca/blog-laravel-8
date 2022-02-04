<?php

namespace App\Http\Controllers;

use App\Events\CommentPost;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $validated = $request->validate([
            'comment' => 'required'
        ]);

        $created = Comment::create([
            'comment' => $validated['comment'],
            'user_id' => auth()->user()->id,
            'post_id' => $post->id
        ]);

        if ($created) {
            event(new CommentPost(auth()->user(), $post));
            return back();
        }

        return back()->with('error_create_comment', 'Ocorreu um erro ao cadastrar o comentário, tente novamente em alguns segundos');
    }

    public function destroy(Comment $comment)
    {
        // $comment = Comment::find($id);

        $comment->delete();

        return back();
    }
}
