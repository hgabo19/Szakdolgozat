<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile page.
     */
    public function show(User $user)
    {
        $user = User::findOrFail($user->id);
        return view('profile.show', compact('user'));
    }

    public function followerList()
    {
        if (Auth::user()) {
            return view('profile.followers');
        } else {
            return redirect()->route('login');
        }
    }

    public function adminList()
    {
        $users = User::paginate(10);
        return view('profile.admin-list', compact('users'));
    }

    public function adminRoleToggle(User $user)
    {
        $this->authorize('manage', User::class);
        $user = User::findOrFail($user->id);
        if ($user == Auth::user()) {
            return redirect()->route('profile.admin-list');
        }
        if ($user->is_admin && $user != Auth::user()) {
            $user->is_admin = false;
        } else {
            $user->is_admin = true;
        }
        $user->save();
        return redirect()->route('profile.admin-list')->with('success', "$user->name's role has changed!");
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    function adminDelete(User $user, UserService $userService)
    {
        $this->authorize('delete', User::class);
        $userToDelete = User::findOrFail($user->id);
        $isSuccessful = $userService->deleteUser($userToDelete);
        if ($isSuccessful) {
            // session()->flash('success', '"' . $userToDelete->username . '" deleted successfully!');
            return redirect()->route('profile.admin-list')->with('success', '"' . $userToDelete->username . '" deleted successfully!');
        }
    }
    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $validated = $request->validated();

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
        if ($request->hasFile('avatar')) {
            $avatarPath = request()->file('avatar')->store('images/profile', 'public');

            $validated['avatar'] = $avatarPath;
            if ($user->avatar) {
                Storage::disk('public')->delete('$user->avatar');
            }
        }

        $user->fill($validated)->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
