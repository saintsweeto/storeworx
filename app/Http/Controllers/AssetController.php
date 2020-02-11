<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssetRequest;
use App\Models\Asset;

class AssetController extends Controller
{
    public function index()
    {
        $assets = Asset::all();
        return view('assets', compact('assets'));
    }

    public function create()
    {
        return view('assets-create');
    }

    public function store(AssetRequest $request)
    {
        $validated = $request->validated();

        $asset = new Asset;
        $asset->name = $validated['name'];
        $asset->description = $validated['description'];
        $asset->code = $validated['code'];
        $asset->sku = $validated['sku'];
        $asset->dimensions = $validated['dimensions'];
        $asset->finishes = $validated['finishes'];
        $asset->location = $validated['location'];
        $asset->quantity = $validated['quantity'] ?? 0;
        $asset->available = $validated['available'] ?? 0;
        $asset->damaged = $validated['damaged'] ?? 0;
        $asset->save();

        return redirect('/assets');
    }

    public function show(Asset $asset)
    {
        //
    }

    public function edit(Asset $asset)
    {
        return view('assets-edit', compact('asset'));
    }

    public function update(AssetRequest $request, Asset $asset)
    {
        $validated = $request->validated();

        $asset = Asset::find($asset->id);
        $asset->name = $validated['name'];
        $asset->description = $validated['description'];
        $asset->code = $validated['code'];
        $asset->sku = $validated['sku'];
        $asset->dimensions = $validated['dimensions'];
        $asset->finishes = $validated['finishes'];
        $asset->location = $validated['location'];
        $asset->quantity = $validated['quantity'] ?? 0;
        $asset->available = $validated['available'] ?? 0;
        $asset->damaged = $validated['damaged'] ?? 0;
        $asset->save();

        return redirect('/assets');
    }

    public function destroy(Asset $asset)
    {
        //
    }
}
