<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return Inertia::render('Project/ProjectIndex', compact('projects'));
    }

    public function create()
    {
        return Inertia::render('Project/ProjectForm');
    }

    public function store(Request $request)
    {
        Project::create($request->all());
        return redirect()->route('projects.index')->with('status', 'Project created.');
    }

    public function show(Project $project)
    {
        //
    }

    public function edit(Project $project)
    {
        return Inertia::render('Project/ProjectForm', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $project->update($request->all());
        return redirect()->back()->with('status','Project updated.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->back()->with('status', 'Project was deleted.');
    }
}
