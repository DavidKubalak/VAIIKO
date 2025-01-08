<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $ideas = Idea::latest()->paginate(5);
        return view("admin.ideas.index", compact('ideas'));
    }

    public function destroy(Idea $idea): \Illuminate\Http\RedirectResponse
    {
        $idea->delete();
        return redirect()->route('admin.ideas.index')->with('success', 'Idea deleted successfully!');
    }

    public function show(Idea $idea): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'idea' => [
                'image_url' => $idea->user->getImageUrl(),
                'name' => $idea->user->name,
                'content' => $idea->content,
                'created_at' => $idea->created_at,
            ]
        ]);
    }

    public function edit(Idea $idea): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'idea' => [
                'image_url' => $idea->user->getImageUrl(),
                'name' => $idea->user->name,
                'content' => $idea->content,
                'created_at' => $idea->created_at,
            ]
        ]);
    }

    public function update(Request $request, Idea $idea): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validate([
            'content' => 'nullable|string',
        ]);

        $idea->update($validated);

        return redirect()->route('admin.ideas.index')->with('success', 'Idea updated successfully!');
    }

}
