<?php

namespace App\Http\Controllers;

use App\Project;
use App\SubProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //return view('subproject.add');
    }

    public function createSB(Request $request, Project $project)
    {
        return view('subproject.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:191',
            'content' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'images.*' => 'required|image',
        ], [
            'end_date.after' => 'Date de fin doit être aprés date de fin',
            'images.*.image' => 'Seuls les fichiers image sont autorisés'
        ]);
        $prjt = Project::findOrFail($request->input('pid'));
        $sb = SubProject::create([
            'title' => $request->title,
            'content' => $request->input('content'),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'user_id' => Auth::user()->id,
            'project_id' => $request->pid
        ]);
        if ($request->has('images') && $images = $request->file('images')) {
            foreach ($images as $image) {
                $link = $image->store('images');
                \App\Image::create([
                    'link' => $link,
                    'parent_id' => $sb->id,
                    'type' => 'subproject'
                ]);
            }
        }
        return back()->with('success', 'Votre sous-projet est créé avec succès, attendez la validation de l\'administrateur');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubProject $subProject
     * @return \Illuminate\Http\Response
     */
    public function show(SubProject $subProject)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubProject $subProject
     * @return \Illuminate\Http\Response
     */
    public function edit(SubProject $subProject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\SubProject $subProject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubProject $subProject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubProject $subProject
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubProject $subProject)
    {
        //
    }
}
