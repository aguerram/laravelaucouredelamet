<?php

namespace App\Http\Controllers;

use App\Project;
use App\SubProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function projets()
    {
        $projects = Project::with(['images'])->orderBy('created_at','desc')->get();
        return view('projets',compact('projects'));
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

    //Profile section
    public function profile(Request $request)
    {
        $user = Auth::user();
        $user->load(['entrprojects','proprojects','subprojects']);
        return view('profile.index',compact('user'));
    }
    public function profileEdit(Request $request)
    {
        $user = Auth::user();
        $user->load(['entrprojects','proprojects','subprojects']);
        return view('profile.edit',compact('user'));
    }
    public function profileEditSave(Request $request)
    {
        $request->validate([
           'datene'=>'date|nullable',
           'address'=>'string|max:255|nullable'
        ]);
        $user = Auth::user();
        $user->datene = $request->datene;
        $user->address = $request->address;
        $user->save();
        return back()->with('success','Votre profil a été modifié');
    }
    public function destroySB($id)
    {

        $sb = SubProject::findOrFail($id);
        if(Auth::user()->id === $sb->user_id)
        {
            $sb->delete();
        }
        return redirect('/profil');
    }
}
