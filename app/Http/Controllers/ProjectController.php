<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }
}
