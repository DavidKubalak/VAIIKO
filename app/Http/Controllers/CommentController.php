<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Idea $idea) {
        $validated = $request->validate([
            'content' => 'required|string|min:1|max:255',
        ]);

        $comment = new Comment();
        $comment->idea_id = $idea->id;
        $comment->user_id = auth()->id();
        $comment->content = $validated['content'];
        $comment->save();

        return redirect()->route('ideas.show', $idea->id)->with('success', "Comment posted successfully!");
    }
}
