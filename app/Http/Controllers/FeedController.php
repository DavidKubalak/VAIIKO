<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user) {
            $ideas = Idea::where('user_id', '!=', $user->id)
                ->latest()
                ->paginate(3);
        } else {
            $ideas = Idea::latest()->paginate(3);
        }

        return view('feed', [
            'ideas' => $ideas,
        ]);
    }
}
