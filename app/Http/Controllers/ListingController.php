<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ListingController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a list of listings for the authenticated user.
     */
    public function index()
    {
        // Fetch listings that belong to the authenticated user
        $listings = Listing::where('user_id', Auth::id())->latest()->get();

        return view('listings.index', compact('listings'));
    }

    /**
     * Show the form to create a new listing.
     */
    public function create()
    {
        // Pass categories to the view for the category dropdown
        $categories = Category::all();

        return view('listings.create', compact('categories'));
    }

    /**
     * Store a newly created listing.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|integer|exists:categories,id',
            'availability' => 'required|boolean',
            'photos.*' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $validated['user_id'] = Auth::id();

        if ($request->hasFile('photos')) {
            $validated['photos'] = json_encode(array_map(fn ($photo) => $photo->store('listings', 'public'), $request->file('photos')));
        }

        Listing::create($validated);

        return redirect()->route('listings.index')->with('status', 'Listing created successfully!');
    }

    /**
     * Show the form to edit a listing.
     */
    public function edit(Listing $listing)
    {
        // Authorize the user to edit the listing
        $this->authorize('update', $listing);

        // Pass categories to the view for the category dropdown
        $categories = Category::all();

        return view('listings.edit', compact('listing', 'categories'));
    }

    /**
     * Update the specified listing.
     */
    public function update(Request $request, Listing $listing)
    {
        $this->authorize('update', $listing);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'category_id' => 'required|integer|exists:categories,id',
            'availability' => 'required|boolean',
            'photos.*' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('photos')) {
            $validated['photos'] = json_encode(array_map(fn ($photo) => $photo->store('listings', 'public'), $request->file('photos')));
        }

        $listing->update($validated);

        return redirect()->route('listings.index')->with('status', 'Listing updated successfully!');
    }

    /**
     * Remove the specified listing from storage.
     */
    public function destroy(Listing $listing)
    {
        $this->authorize('delete', $listing);

        $listing->delete();

        return redirect()->route('listings.index')->with('status', 'Listing deleted successfully!');
    }

    public function publicIndex(Request $request)
    {
        $categories = Category::all();
        $listingsQuery = Listing::where('availability', true);

        // Apply filters and sorting
        $this->applyFilters($listingsQuery, $request);
        $this->applySorting($listingsQuery, $request);

        // Get selected categories for the view
        $selectedCategories = $request->input('categories', []);

        // Paginate results
        $listings = $listingsQuery->paginate(9)->withQueryString();

        return view('listings.public', compact('listings', 'categories', 'selectedCategories'));
    }

    private function applyFilters($query, $request)
    {
        // Filter by categories
        if ($request->filled('categories')) {
            $query->whereIn('category_id', $request->input('categories'));
        }

        // Filter by name
        if ($request->filled('name')) {
            $query->where('title', 'like', '%' . $request->input('name') . '%');
        }

        // Filter by user
        if ($request->filled('user')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->input('user') . '%');
            });
        }
    }

    private function applySorting($query, $request)
    {
        if ($request->filled('sort')) {
            [$field, $direction] = explode(':', $request->input('sort'));
            $query->orderBy($field, $direction ?? 'asc');
        } else {
            $query->latest(); // Default sorting
        }
    }

}
