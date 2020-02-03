<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all();
        $fields = Report::FIELDS;

        return view('reports', [
            'reports' => $reports,
            'fields' => $fields,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $report = new Report();
        $report->name = $request->name;
        $report->type = $request->type;
        $report->requester = $request->requester;
        $report->assets = json_encode($request->assets);
        $report->fields = json_encode($request->fields);
        $report->save();

        return redirect('/reports');
    }

    public function show(Report $report)
    {
        //
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
