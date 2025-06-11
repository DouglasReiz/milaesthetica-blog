<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'comment' => 'required|string|max:1000',
        ]);

        Comment::create([
            'post_id' => $postId,
            'name' => $request->input('name'),
            'comment' => $request->input('comment'),
        ]);

        return back()->with('success', 'Comentário enviado com sucesso!');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->back()->with('success', 'Comentário deletado com sucesso!');
    }
}
