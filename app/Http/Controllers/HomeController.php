<?php

namespace App\Http\Controllers;

use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::published()
            ->orderBy('sort_order')
            ->get();

        $featured = $projects->where('featured')->take(4);

        return view('home', compact('projects', 'featured'));
    }
}
