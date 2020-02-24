<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssetRequest;
use App\Models\Asset;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $asset->upload_id = $request->upload_id;
        $asset->name = $validated['name'];
        $asset->description = $validated['description'];
        $asset->code = $validated['code'];
        $asset->sku = $validated['sku'];
        $asset->dimensions = $validated['dimensions'];
        $asset->finishes = $validated['finishes'];
        $asset->location = $validated['location'];
        $asset->quantity = $request->quantity ?? 0;
        $asset->damaged = $request->damaged ?? 0;
        $asset->save();

        return redirect('/assets');
    }

    public function upload(Request $request)
    {
        $file = $request->file('file');

        $upload = new Upload;
        $upload->user_id = auth()->user()->id;
        $upload->filename = $file->getClientOriginalName();
        $upload->temp = Str::random(8) . '.' . $file->getClientOriginalExtension();
        $upload->extension = '.' . $file->getClientOriginalExtension();
        $upload->save();

        $request->file('file')->storeAs('public/uploads', $upload->temp);

        return $upload->id;
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
        $asset = Asset::find($asset->id);
        $asset->name = $request->name;
        $asset->description = $request->description;
        $asset->code = $request->code;
        $asset->sku = $request->sku;
        $asset->dimensions = $request->dimensions;
        $asset->finishes = $request->finishes;
        $asset->location = $request->location;
        $asset->save();

        return redirect('/assets');
    }

    public function destroy(Asset $asset)
    {
        //
    }
}
