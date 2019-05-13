<?php

namespace App\Http\Controllers;

use App\Project;
use App\SubProject;
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
        $projects = Project::with(['images'])->orderBy('created_at','desc')->get();
        return view('home',compact('projects'));
    }
    public function projetIndex(Project $project)
    {
        $subprojects = SubProject::where('active',true)->orderBy('created_at','desc');
        $project->load(['images','comments'=>function($query){
            $query->orderBy('created_at','desc');
        },'comments.user','comments.images','subprojects'=>function($query){
            $query->where('active',true);
        }]);

        return view('project',compact('project','subprojects'));
    }
}
