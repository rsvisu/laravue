<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\SeedProjectRequest;
use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = auth()->id();

        $projects = Project::where('user_id', $user_id)->get();
        $tableConfig = config('tables.projects');

        return Inertia::render('Projects/Index',
            compact('projects', 'tableConfig'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Projects/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $project = new Project($request->validated());
        $project->user_id = auth()->id();
        $project->save();

        return redirect(route('projects.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return Inertia::render('Projects/Edit', [
            'project' => $project
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->validated());
        return redirect(route('projects.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return back();
    }

    /**
     * Run the project seeder.
     */
    public function seed(SeedProjectRequest $request)
    {
        $count = $request->validated('count', 10);
        Project::factory()->count($count)->create([
            'user_id' => auth()->id(),
        ]);
        return back();
    }
}
