<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projects = Project::with('images')->orderBy('created_at','desc')->get();
        return view('home',compact('projects'));
    }
    public function projetIndex(Project $project)
    {
        $project->load('images');
        return view('project',compact('project'));
    }
}
