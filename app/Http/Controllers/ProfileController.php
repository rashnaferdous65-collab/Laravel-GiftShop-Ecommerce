<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
 use Illuminate\Http\RedirectResponse; 
 use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Auth; 
  use Illuminate\Support\Facades\Redirect;
   use Illuminate\View\View;
class ProfileController extends Controller
{
    // Show profile edit page
    public function edit(Request $request)
    {
        return view('profile.edit')->with([
            'user' => $request->user()
        ]);
    }

    // Update profile info
    public function update(ProfileUpdateRequest $request)
    {
        $user = $request->user();

        $user->update($request->validated());

        if ($user->wasChanged('email')) {
            $user->email_verified_at = null;
            $user->save();
        }

        return redirect()
            ->route('profile.edit')
            ->with('status', 'profile-updated');
    }

    // Delete user account
    public function destroy(Request $request)
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $user->delete();

        return redirect('/');
    }
}

