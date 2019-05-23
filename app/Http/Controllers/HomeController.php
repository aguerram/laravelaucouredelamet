<?php

namespace App\Http\Controllers;

use App\Project;
use App\SubProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $users = \App\User::withCount('votes')->with('votes')->orderBy("votes_count",'desc')->limit(3)->get();
        $projects = Project::with(['images'])->orderBy('created_at', 'desc')->get();
        return view('home', compact('projects','users'));
    }
    public function projets()
    {
        $projects = Project::with(['images'])->orderBy('created_at', 'desc')->get();
        return view('projets', compact('projects'));
    }
    public function projetIndex(Project $project)
    {
        $subprojects = SubProject::where('active', true)->orderBy('created_at', 'desc');
        $project->load(['images', 'comments' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }, 'comments.user', 'comments.images', 'subprojects' => function ($query) {
            $query->where('active', true);
        }]);

        return view('project', compact('project', 'subprojects'));
    }

    //Profile section
    public function profileMember(Request $request,\App\User $user)
    {
        if($user->id == Auth::user()->id)
            return redirect('/profile');
        $voted = count(\App\Vote::where('owner_id',$user->id)->where('by',Auth::user()->id)->get())>0;

        $user->load(['entrprojects', 'proprojects', 'subprojects','votes']);
        return view('profile.user', compact('user','voted'));
    }
    public function vote(Request $request,\App\User $user)
    {
        $vote = \App\Vote::where('owner_id',$user->id)->where('by',Auth::user()->id)->get();
        if(count($vote)<1)
        {
            \App\Vote::create([
                'owner_id'=>$user->id,
                'by'=>Auth::user()->id
            ]);
        }
        
        return back();
    }
    public function profile(Request $request)
    {
        $user = Auth::user();
        $user->load(['entrprojects', 'proprojects', 'subprojects','votes']);
        return view('profile.index', compact('user'));
    }
    public function profileEdit(Request $request)
    {

        $user = Auth::user();
        $user->load(['entrprojects', 'proprojects', 'subprojects']);
        return view('profile.edit', compact('user'));
    }
    public function profileEditSave(Request $request)
    {
        $request->validate([
            'datene' => 'date|nullable',
            'address' => 'string|max:255|nullable',
            'password' => 'nullable|confirmed|min:8|max:60',
            'ecole'=>'nullable|string|min:3|max:120',
            'niveau'=>'nullable|string|min:3|max:120',
            'filiere'=>'nullable|string|min:2|max:120',
        ], [
            'password.confirmed' => 'La confirmation de mot de pass ne corespond pas'
        ]);
        $user = Auth::user();
        $user->datene = $request->datene;
        $user->address = $request->address;
        $user->ecole = $request->ecole;
        $user->niveau = $request->niveau;
        $user->filiere = $request->filiere;
        if ($request->has('password')) {
            $password = $request->password;
            if (strlen($password) >= 8) {

                $user->password = Hash::make($password);
            }
        }
        $user->save();
        return back()->with('success', 'Votre profil a été modifié');
    }
    public function destroySB($id)
    {

        $sb = SubProject::findOrFail($id);
        if (Auth::user()->id === $sb->user_id) {
            $sb->delete();
        }
        return redirect('/profil');
    }

    public function search(Request $request)
    {
        if ($request->has('s')) {
            $projects = Project::where('title', 'LIKE', "%$request->s%")
                ->orWhere('content', 'LIKE', "%$request->s%")->get();

            $sprojects = SubProject::where('title', 'LIKE', "%$request->s%")
                ->orWhere('content', 'LIKE', "%$request->s%")->get();
            return view('search', compact('projects', 'sprojects'));
        } else {
            return redirect('/');
        }
    }
}
