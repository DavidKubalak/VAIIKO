<?php

namespace App\Http\Controllers;

use App\Models\Idea;

class FeedController extends Controller
{
    public function index()
    {
        $ideas = Idea::latest()->paginate(3);

        return view('feed', [
            'ideas' => $ideas,
        ]);
    }
}
