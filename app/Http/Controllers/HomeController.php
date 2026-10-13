<?php

namespace App\Http\Controllers;

use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $featured = Project::published()
            ->featured()
            ->orderBy('sort_order')
            ->take(3)
            ->get();

        return view('home', compact('featured'));
    }
}
