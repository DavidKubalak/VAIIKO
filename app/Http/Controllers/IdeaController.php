<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    use AuthorizesRequests;

    public function store(Request $request) {
        $validated = $request->validate([
            'content' => 'required|string|min:3|max:240',
        ]);

        $validated['user_id'] = auth()->id();

        $idea = Idea::create($validated);

        return redirect()->route('dashboard')->with('success', 'Idea created successfully!');
    }

    public function show(Idea $idea) {
         return view('ideas.show', [
          'idea'=> $idea,
         ]);
    }

    public function edit(Idea $idea) {

        // -- USING POLICY --
        $this->authorize('update', $idea);

        $edit = true;
        return view('ideas.show', compact('idea', 'edit'));
    }

    public function update(Request $request, Idea $idea) {

        // -- USING POLICY --
        $this->authorize('update', $idea);

        $valideted = $request->validate([
            'content' => 'required|string|min:3|max:240',
        ]);

        $idea->update($valideted);

        return redirect()->route('ideas.show', $idea->id)->with('success','Idea updated successfully!');
    }

    public function destroy(Idea $idea)
    {
        $this->authorize('delete', $idea);

        $idea->delete();

        return response()->json(['message' => 'Idea deleted successfully!']);
    }




}
