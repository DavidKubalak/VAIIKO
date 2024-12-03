<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Idea;
use Illuminate\Http\Request;

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
