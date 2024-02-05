<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplyStoreRequest;
use App\Models\Apply;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ApplyController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {

    return Inertia::render('Apply/Index', [
      'applies' =>
      Apply::where('user_id', auth()->user()->id)
        ->with('job')
        ->paginate(10)
        ->withQueryString()
        ->through(fn ($apply) => [
          'id' => $apply->id,
          'title' => $apply->job->title,
          'company' => $apply->job->company,
          'salary' => $apply->job->salary,
          'message' => $apply->comment,
        ]),
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(Job $job)
  {
    return Inertia::render('Job/Apply', ['job' => $job]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(ApplyStoreRequest $request, Job $job)
  {


    try {

      $file = $request->file('cv');

      $path = $file->store(
        'files',
        'public'
      );

      $apply = new Apply();
      $apply->file = $path;
      $apply->comment = $request->comment;
      $apply->user_id =
        auth()->user()->id;
      $apply->job_id = $job->id;

      $apply->save();

      return Redirect::route('jobs.index')->with('success', 'Trabajo aplicado.');
    } catch (\Throwable $th) {
      //throw $th;
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }
}
