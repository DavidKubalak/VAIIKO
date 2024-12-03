<?php

namespace App\Http\Controllers;

use App\Models\Idea;

class DashboardController extends Controller
{
    public function index()
    {
        $ideas = Idea::latest()->paginate(3);

        return view('dashboard', [
            'ideas' => $ideas,
        ]);
    }
}
