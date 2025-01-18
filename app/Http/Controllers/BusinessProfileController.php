<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessProfile;

class BusinessProfileController extends Controller
{
    public function create()
    {
        return view('business_profiles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'contact_email' => 'nullable|email',
            'contact_phone' => 'nullable|string',
            'logo' => 'nullable|image|max:2048',
        ]);

        $path = $request->file('logo') ? $request->file('logo')->store('logos') : null;

        auth()->user()->businessProfile()->create([
            'name' => $request->name,
            'description' => $request->description,
            'contact_email' => $request->contact_email,
            'contact_phone' => $request->contact_phone,
            'logo' => $path,
        ]);

        return redirect()->route('dashboard')->with('status', 'Business profile created successfully!');
    }

    public function show($id)
    {
        $businessProfile = BusinessProfile::with('user', 'user.listings')->findOrFail($id);

        return view('business_profiles.show', compact('businessProfile'));
    }
}
