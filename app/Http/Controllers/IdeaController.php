<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    use AuthorizesRequests;

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validate([
            'content' => 'required|string|min:3|max:240',
        ]);

        $validated['user_id'] = auth()->id();

        $idea = Idea::create($validated);

        return redirect()->route('dashboard')->with('success', 'Idea created successfully!');
    }

    public function show(Idea $idea): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
         return view('ideas.show', [
          'idea'=> $idea,
         ]);
    }

    /**
     * @throws AuthorizationException
     */
    public function edit(Idea $idea): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $this->authorize('update', $idea);

        $edit = true;
        return view('ideas.show', compact('idea', 'edit'));
    }

    /**
     * @throws AuthorizationException
     */
    public function update(Request $request, Idea $idea): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('update', $idea);

        $valideted = $request->validate([
            'content' => 'required|string|min:3|max:240',
        ]);

        $idea->update($valideted);

        return redirect()->route('ideas.show', $idea->id)->with('success','Idea updated successfully!');
    }

    /**
     * @throws AuthorizationException
     */
    public function destroy(Idea $idea): \Illuminate\Http\JsonResponse
    {
        $this->authorize('delete', $idea);

        $idea->delete();

        return response()->json(['message' => 'Idea deleted successfully!']);
    }
}
