<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\Asset;
use App\Models\AssetActivity;
use App\Models\Job;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        return view('jobs', compact('jobs'));
    }

    public function create(Asset $asset)
    {
        return view('jobs-create', [
            'asset' => $asset,
            'assets' => Asset::all(),
        ]);
    }

    public function store(JobRequest $request)
    {
        $validated = $request->validated();

        $job = new Job;
        $job->asset_id = $validated['asset_id'];
        $job->requester = $validated['requester'];
        $job->date = date('Y-m-d', strtotime($validated['date']));
        $job->from = $validated['from'];
        $job->to = $validated['to'];
        $job->quantity = $validated['quantity'];
        $job->job_instructions = $request->job_instructions;
        $job->site_contact_details = $request->site_contact_details;
        $job->status = $request->action;
        $job->save();

        $asset = Asset::find($validated['asset_id']);
        $asset->available = $asset->available - $validated['quantity'];

        $activity = new AssetActivity;
        $activity->asset_id = $asset->id;
        $activity->user_id = auth()->user()->id;
        $activity->icon = 'fe-edit-3';

        if ($request->action === 'pending') {
            $asset->quantity = $validated['quantity'];
            $activity->description = '<p class="small text-gray-700 mb-0"><a href="#">'.auth()->user()->name.'</a> created a job, and moved <b>'.$validated['quantity'].'</b> items</p>';
        }
        else if ($request->action === 'reserved') {
            $asset->reserved = $validated['quantity'];
            $activity->description = '<p class="small text-gray-700 mb-0"><a href="#">'.auth()->user()->name.'</a> created a job, and reserved <b>'.$validated['quantity'].'</b> items</p>';
        }
        $asset->save();
        $activity->save();

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

    public function update(JobRequest $request, Job $job)
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
