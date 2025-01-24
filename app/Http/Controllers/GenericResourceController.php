<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenericResourceController extends Controller
{
    protected $model;
    protected $routePrefix;

    public function index($type)
    {
        $model = $this->getModel($type);
        $listings = $model::all();
        return view('listings.index', compact('listings', 'type'));
    }

    public function create($type)
    {
        return view('listings.create', compact('type'));
    }

    public function store(Request $request, $type)
    {
        $model = $this->getModel($type);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        $model::create($validated);
        return redirect()->route('listings.index', ['type' => $type]);
    }

    public function show($type, $id)
    {
        $model = $this->getModel($type);
        $listing = $model::findOrFail($id);
        return view('listings.show', compact('listing', 'type'));
    }

    public function edit($type, $id)
    {
        $model = $this->getModel($type);
        $listing = $model::findOrFail($id);
        return view('listings.edit', compact('listing', 'type'));
    }

    public function update(Request $request, $type, $id)
    {
        $model = $this->getModel($type);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        $listing = $model::findOrFail($id);
        $listing->update($validated);
        return redirect()->route('listings.index', ['type' => $type]);
    }

    public function destroy($type, $id)
    {
        $model = $this->getModel($type);
        $listing = $model::findOrFail($id);
        $listing->delete();
        return redirect()->route('listings.index', ['type' => $type]);
    }

    private function getModel($type)
    {
        $models = [
            'uye' => \App\Models\Uye::class,
            'teka-teki' => \App\Models\TekaTeki::class,
            'veyoyee' => \App\Models\Veyoyee::class,
            'jobmatch' => \App\Models\JobMatch::class,
            'slide-market' => \App\Models\SlideMarket::class,
        ];

        if (!isset($models[$type])) {
            abort(404, 'Invalid project type.');
        }

        return $models[$type];
    }
}
