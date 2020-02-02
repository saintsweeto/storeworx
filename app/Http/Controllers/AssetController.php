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
        //
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
