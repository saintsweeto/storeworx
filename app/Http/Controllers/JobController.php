<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\Asset;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        return view('jobs', compact('jobs'));
    }

    public function create(Asset $asset)
    {
        return view('jobs-create', compact('asset'));
    }

    public function store(JobRequest $request)
    {
        $validated = $request->validated();

        $job = new Job;
        $job->asset_id = $request['asset_id'];
        $job->requester = $request['requester'];
        $job->date = date('Y-m-d', strtotime($request['date']));
        $job->from = $request['from'];
        $job->to = $request['to'];
        $job->quantity = $request['quantity'];
        $job->job_instructions = $request->job_instructions;
        $job->site_contact_details = $request->site_contact_details;
        $job->status = $request->action;
        $job->save();

        return redirect('/jobs');
    }

    public function show(Job $job)
    {
        //
    }

    public function edit(Job $job)
    {
        return view('jobs-edit', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        $job = Job::find($job->id);
        $job->asset_id = $request->asset_id;
        $job->requester = $request->requester;
        $job->date = date('Y-m-d', strtotime($request->date));
        $job->from = $request->from;
        $job->to = $request->to;
        $job->quantity = $request->quantity;
        $job->job_instructions = $request->job_instructions;
        $job->site_contact_details = $request->site_contact_details;
        $job->status = $request->action;
        $job->save();

        return redirect('/jobs');
    }

    public function destroy(Job $job)
    {
        //
    }
}
