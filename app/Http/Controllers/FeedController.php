<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $user = Auth::user();

        if ($user) {
            $ideas = Idea::whereIn('user_id', $user->followings->pluck('id'))
                ->latest()
                ->paginate(3);
        } else {
            $ideas = collect();
        }

        return view('feed', [
            'ideas' => $ideas,
        ]);
    }
}
