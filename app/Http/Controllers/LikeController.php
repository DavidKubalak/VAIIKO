<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function likeIdea(Idea $idea)
    {
        $user = auth()->user();

        // Check if the user already liked the idea
        if ($user->likes()->where('idea_id', $idea->id)->exists()) {
            return back()->with('error', 'You already liked this idea.');
        }

        // Create a new like
        Like::create([
            'user_id' => $user->id,
            'idea_id' => $idea->id,
        ]);

        return back()->with('success', 'Idea liked successfully.');
    }

    public function unlikeIdea(Idea $idea)
    {
        $user = auth()->user();

        // Odstráni lajky pre konkrétny nápad
        $user->likes()->where('idea_id', $idea->id)->delete();

        return back()->with('success', 'Idea unliked successfully.');
    }


    public function likeComment(Comment $comment)
    {
        $user = auth()->user();

        // Skontroluje, či užívateľ už lajkol komentár
        if ($user->likes()->where('comment_id', $comment->id)->exists()) {
            return back()->with('error', 'You already liked this comment.');
        }

        // Vytvorí nový like
        Like::create([
            'user_id' => $user->id,
            'comment_id' => $comment->id,
        ]);

        return back()->with('success', 'Comment liked successfully.');
    }

    public function unlikeComment(Comment $comment)
    {
        $user = auth()->user();

        // Odstráni like pre konkrétny komentár
        $user->likes()->where('comment_id', $comment->id)->delete();

        return back()->with('success', 'Comment unliked successfully.');
    }
}
