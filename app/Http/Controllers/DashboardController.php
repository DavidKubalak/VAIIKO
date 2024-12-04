<?php

namespace App\Http\Controllers;

use App\Models\Idea;

class DashboardController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $ideas = Idea::latest()->paginate(3);

        return view('dashboard', [
            'ideas' => $ideas,
        ]);
    }
}
