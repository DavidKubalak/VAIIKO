<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $users = User::latest()->paginate(5);
        return view('admin.users.index', compact('users'));
    }

    public function destroy(User $user): \Illuminate\Http\RedirectResponse
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully!');
    }

    public function show(User $user): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'user' => [
                'image_url' => $user->getImageUrl(),
                'name' => $user->name,
                'email' => $user->email,
                'bio' => $user->bio,
            ]
        ]);
    }

    public function edit(User $user): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'user' => [
                'image_url' => $user->getImageUrl(),
                'name' => $user->name,
                'email' => $user->email,
                'bio' => $user->bio,
            ]
        ]);
    }

    public function update(Request $request, User $user): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'bio' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);


        if($request->has('image')) {
            $imagePath = $request->file('image')->store('profile', 'public');
            $validated['image'] = $imagePath;

            Storage::disk('public')->delete($user->image ?? '');
        }

        $user->update($validated);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully!');
    }
}
