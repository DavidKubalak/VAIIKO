<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display the current authenticated user's profile.
     */
    public function profile(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $user = auth()->user();

        if (!$user instanceof \App\Models\User) {
            abort(403, 'Unauthorized access.');
        }

        return $this->show($user);
    }

    /**
     * Display a specific user's profile.
     */
    public function show(User $user): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $ideas = $user->ideas()->paginate(5);
        return view('users.show', compact('user', 'ideas'));
    }

    /**
     * Edit a user's profile.
     * @throws AuthorizationException
     */
    public function edit(User $user): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $this->authorize('update', $user);

        $ideas = $user->ideas()->paginate(5);
        return view('users.edit', compact('user', 'ideas'));
    }

    /**
     * Update a user's profile.
     * @throws AuthorizationException
     */
    public function update(Request $request, User $user): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('update', $user);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string|max:500',
            'image' => 'nullable|image|max:2048',
        ]);

        // Spracovanie profilového obrázku
        if ($request->has('image')) {
            // Odstránenie starého obrázku
            if ($user->image && file_exists(public_path($user->image))) {
                unlink(public_path($user->image));
            }

            // Uloženie nového obrázku do priečinka public/uploads
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads'), $fileName);
            $validated['image'] = 'uploads/' . $fileName;
        }

        // Odstránenie profilového obrázku, ak je zaškrtnuté "Remove"
        if ($request->has('remove_image') && $request->remove_image == 1) {
            if ($user->image && file_exists(public_path($user->image))) {
                unlink(public_path($user->image));
            }
            $validated['image'] = null;
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
