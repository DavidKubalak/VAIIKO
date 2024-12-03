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

        // Idea::create([
        //     'content' => $request->get('content', ''),
        // ]);

        //$idea = Idea::create($request->all());

        $validated['user_id'] = auth()->id();

        $idea = Idea::create($validated);

        return redirect()->route('dashboard')->with('success', 'Idea created successfully!');
    }

    public function show(Idea $idea) {
        // return view('ideas.show', [
        //  'idea'=> $idea,
        // ]);
        return view('ideas.show', compact('idea'));
    }

    public function edit(Idea $idea) {
        // if (auth()->id() !== $idea->user_id) {
        //     abort(404);
        // }

        // -- USING GATES --
        // if (!Gate::allows('idea.edit', $idea)) {
        //     abort(403);
        // }
        // $this->authorize('idea.edit', $idea);

        // -- USING POLICY --
        $this->authorize('update', $idea);

        $edit = true;
        return view('ideas.show', compact('idea', 'edit'));
    }

    public function update(Request $request, Idea $idea) {
        // if (auth()->id() !== $idea->user_id) {
        //     abort(404);
        // }

        // -- USING GATES --
        // if (!Gate::allows('idea.edit', $idea)) {
        //     abort(403);
        // }
        //$this->authorize('idea.edit', $idea);


        // -- USING POLICY --
        $this->authorize('update', $idea);

        $valideted = $request->validate([
            'content' => 'required|string|min:3|max:240',
        ]);

        // $idea->content = $request->get('content', '');
        // $idea->save();

        $idea->update($valideted);

        return redirect()->route('ideas.show', $idea->id)->with('success','Idea updated successfully!');
    }

    public function destroy(Idea $idea) {
        // if (auth()->id() !== $idea->user_id) {
        //     abort(404);
        // }

        // -- USING GATES --
        // if (!Gate::allows('idea.delete', $idea)) {
        //     abort(403);
        // }
        // $this->authorize('idea.delete', $idea);

        // -- USING POLICY --
        $this->authorize('update', $idea);

        //Idea::where('id', $id)->firstOrFail()->delete();
        $idea->delete();

        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully!');
    }
}
