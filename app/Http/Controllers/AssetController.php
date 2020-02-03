<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

    public function store(Request $request)
    {
        $asset = new Asset;
        $asset->name = $request->name;
        $asset->description = $request->description;
        $asset->code = $request->code;
        $asset->sku = $request->sku;
        $asset->dimensions = $request->dimensions;
        $asset->finishes = $request->finishes;
        $asset->location = $request->location;
        $asset->quantity = $request->quantity ?? 0;
        $asset->available = $request->quantity ?? 0;
        $asset->damaged = $request->damaged ?? 0;
        $asset->save();

        return redirect('/assets');
    }

    public function show(Asset $asset)
    {
        //
    }

    public function edit(Asset $asset)
    {
        //
    }

    public function update(Request $request, Asset $asset)
    {
        //
    }

    public function destroy(Asset $asset)
    {
        //
    }
}
