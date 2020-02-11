<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovementRequest;
use App\Models\Asset;
use App\Models\Movement;
use Illuminate\Http\Request;

class MovementController extends Controller
{
    public function index()
    {
        $movements = Movement::all();
        return view('movements', compact('movements'));
    }

    public function create(string $type, Asset $asset)
    {
        return view('movements-create', [
            'type' => $type,
            'asset' => $asset,
        ]);
    }

    public function store(MovementRequest $request)
    {
        $validated = $request->validated();

        $movement = new Movement;
        $movement->asset_id = $validated['asset_id'];
        $movement->type = $validated['type'];
        $movement->job_no = $validated['job_no'];
        $movement->from = $validated['from'];
        $movement->to = $validated['to'];
        $movement->quantity = $validated['quantity'];
        $movement->damaged = $validated['damaged'];
        $movement->po_no = $validated['po_no'];
        $movement->comments = $validated['comments'];
        $movement->bill_materials = $validated['bill_materials'];
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
