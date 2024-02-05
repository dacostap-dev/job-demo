<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobStoreRequest;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class JobController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return Inertia::render('Job/Index', [
      'jobs' =>
      Job::paginate(10)
        ->withQueryString()
        ->through(fn ($job) => [
          'id' => $job->id,
          'title' => $job->title,
          'company' => $job->company,
          'description' => $job->description,
          'salary' => $job->salary,
        ]),
    ]);
  }


  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return Inertia::render('Job/Create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(JobStoreRequest $request)
  {

    Job::create([
      'title' => $request->title,
      'company' => $request->company,
      'description' => $request->description,
      'salary' => $request->salary,
    ]);

    return Redirect::route('jobs.index')->with('success', 'Trabajo creado.');
  }

  /**
   * Display the specified resource.
   */
  public function show(Job $job)
  {
    return Inertia::render('Job/Detail', ['job' => $job->load('applies.user')]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }


  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }
}
