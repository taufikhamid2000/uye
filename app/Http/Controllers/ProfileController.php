<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $request->validate([
            'current_password' => 'required_with:password|string',
            'password' => 'nullable|string|min:8|confirmed',
            'phone' => ['nullable', 'regex:/^\+?[1-9]\d{1,14}$/'],
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validation for profile photo
        ]);

        $user = $request->user();

        // Check if current password matches
        if ($request->filled('current_password') && !Hash::check($request->current_password, $user->password)) {
            return redirect('/profile')->withErrors(['current_password' => 'The provided password does not match our records.']);
        }

        // Update password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Update profile photo if uploaded
        if ($request->hasFile('profile_photo')) {
            // Delete existing photo if it exists
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            // Save the new profile photo
            $user->profile_photo = $request->file('profile_photo')->store('profile_photos', 'public');
        }

        // Update other fields
        $user->fill($request->only(['name', 'email', 'phone']));

        $user->save();

        return redirect('/profile')->with('status', 'Profile updated successfully.');
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

        return redirect('/'); // Ensure return type matches RedirectResponse
    }


}
