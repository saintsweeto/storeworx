<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovementRequest;
use App\Models\Asset;
use App\Models\Movement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovementController extends Controller
{
    public function index()
    {
        $assets = Asset::all();
        $movements = Movement::all();

        return view('movements', [
            'assets' => $assets,
            'movements' => $movements,
        ]);
    }

    public function create(string $type, Asset $asset)
    {
        $next_id = Movement::max('id');
        $next_id = $next_id === null ? 100000 : $next_id + 1;

        return view('movements-create', [
            'entry_no' => $next_id,
            'type' => $type,
            'asset' => $asset,
            'assets' => Asset::all(),
        ]);
    }

    public function store(MovementRequest $request)
    {
        $validated = $request->validated();

        $movement = new Movement;
        $movement->asset_id = $validated['asset_id'];
        $movement->type = $validated['type'];
        $movement->from = $validated['from'];
        $movement->to = $validated['to'];
        $movement->quantity = $validated['quantity'];
        $movement->damaged = $validated['damaged'];
        $movement->po_no = $validated['po_no'];
        $movement->comments = $request->comments;
        $movement->bill_materials =  $request->bill_materials;
        $movement->save();

        return redirect('/movements');
    }

    public function show(Movement $movement)
    {
        //
    }

    public function edit(Movement $movement)
    {
        //
    }

    public function update(Request $request, Movement $movement)
    {
        //
    }

    public function destroy(Movement $movement)
    {
        //
    }
}
