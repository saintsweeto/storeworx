<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all();
        $assets = Asset::all();
        $fields = Report::FIELDS;

        return view('reports', [
            'reports' => $reports,
            'assets' => $assets,
            'fields' => $fields,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'requester' => 'required',
            'included_assets' => 'required',
        ]);

        $report = new Report();
        $report->name = $request->name;
        $report->type = $request->type;
        $report->requester = $request->requester;
        $report->included_assets = json_encode($request->included_assets);
        $report->fields = json_encode($request->fields);
        $report->save();

        return redirect('/reports');
    }

    public function show(Report $report)
    {
        $fields = array_map(function ($field_id) {
            return Report::FIELDS[$field_id];
        }, string_to_array($report->fields));

        $assets = array_map(function (int $asset_id) {
            return Asset::find($asset_id);
        }, string_to_array($report->included_assets));

        return view('reports-show', [
            'report' => $report,
            'assets' => $assets,
            'fields' => $fields,
        ]);
    }

    public function edit(Report $report)
    {
        //
    }

    public function update(Request $request, Report $report)
    {
        //
    }

    public function destroy(Report $report)
    {
        //
    }
}
