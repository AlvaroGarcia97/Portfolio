<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::published()
            ->orderBy('sort_order')
            ->get();

        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        abort_unless($project->published, 404);

        $others = Project::published()
            ->whereKeyNot($project->getKey())
            ->orderBy('sort_order')
            ->take(3)
            ->get();

        return view('projects.show', compact('project', 'others'));
    }
}
