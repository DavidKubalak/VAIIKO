<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display the current authenticated user's profile.
     */
    public function profile() {
        return $this->show(auth()->user());
    }

    /**
     * Display a specific user's profile.
     */
    public function show(User $user)
    {
        $ideas = $user->ideas()->paginate(5);
        return view('users.show', compact('user', 'ideas'));
    }

    /**
     * Edit a user's profile.
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);

        $ideas = $user->ideas()->paginate(5);
        return view('users.edit', compact('user', 'ideas'));
    }

    /**
     * Update a user's profile.
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string|max:500',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('profile_images', 'public');
        }

        $user->update($validated);

        return redirect()->route('users.show', $user)->with('success', 'Profile updated successfully!');
    }

    public function follow(User $user): \Illuminate\Http\RedirectResponse
    {
        $authUser = Auth::user();

        if ($authUser->id !== $user->id && !$authUser->follows($user)) {
            $authUser->followings()->attach($user->id);
        }

        return redirect()->route('users.show', $user)->with('success', 'You are now following ' . $user->name);
    }

    public function unfollow(User $user): \Illuminate\Http\RedirectResponse
    {
        $authUser = Auth::user();

        if ($authUser->follows($user)) {
            $authUser->followings()->detach($user->id);
        }

        return redirect()->route('users.show', $user)->with('success', 'You have unfollowed ' . $user->name);
    }

}
