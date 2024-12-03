<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Filtrovanie nápadov podľa hľadania
        $ideas = Idea::when($request->has('search'), function ($query) {
            $query->where('content', 'like', '%' . request('search', '') . '%');
        })->orderBy('created_at', 'DESC');

        // Najlepší používatelia podľa počtu nápadov
        $topUsers = User::withCount('ideas') // Počet nápadov pre každého používateľa
        ->orderBy('ideas_count', 'desc') // Zoradenie podľa počtu nápadov
        ->take(5) // Zobrazí iba 5 používateľov
        ->get();

        // Návrat view so zdieľanými dátami
        return view('dashboard', [
            'ideas' => $ideas->paginate(5),
            'topUsers' => $topUsers,
        ]);
    }
}
