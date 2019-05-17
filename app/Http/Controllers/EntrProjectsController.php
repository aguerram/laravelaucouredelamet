<?php

namespace App\Http\Controllers;

use App\EntrProjects;
use App\ProProjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntrProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects  = Auth::user()->entrprojects()->orderBy('id','desc')->get();
        return view('entrprojects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entrprojects.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:191',
            'body' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'images.*' => 'required|image',
        ], [
            'end_date.after' => 'Date de fin doit être aprés date de début',
            'images.*.image' => 'Seuls les fichiers image sont autorisés'
        ]);
        $sb = EntrProjects::create([
            'title' => $request->title,
            'body' => $request->body,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'user_id' => Auth::user()->id,
        ]);
        if ($request->has('images') && $images = $request->file('images')) {
            foreach ($images as $image) {
                $link = $image->store('images');
                \App\Image::create([
                    'link' => $link,
                    'parent_id' => $sb->id,
                    'type' => 'entrproject'
                ]);
            }
        }
        return back()->with('success', 'Votre projet entrepreneurials est créé avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProProjects  $proProjects
     * @return \Illuminate\Http\Response
     */
    public function show($proProjects)
    {
        $sb = EntrProjects::findOrFail($proProjects);
        if($sb->user_id != Auth::user()->id)
            abort(403);
        return view('entrprojects.show',compact('sb'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProProjects  $proProjects
     * @return \Illuminate\Http\Response
     */
    public function edit($proProjects)
    {
        $v = EntrProjects::findOrFail($proProjects);
        if($v->user_id != Auth::user()->id)
            abort(403);
        return view('entrprojects.edit',compact('v'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProProjects  $proProjects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $proProjects)
    {
        $sb = EntrProjects::findOrFail($proProjects);
        if($sb->user_id != Auth::user()->id)
            abort(403);
        if($sb->user_id != Auth::user()->id)
            return response('',401);
        $request->validate([
            'title' => 'required|max:191',
            'body' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'images.*' => 'required|image',
        ], [
            'end_date.after' => 'Date de fin doit être aprés date de début',
            'images.*.image' => 'Seuls les fichiers image sont autorisés'
        ]);

        $sb->title = $request->title;
        $sb->body = $request->body;
        $sb->start_date = $request->start_date;
        $sb->end_date = $request->end_date;
        $sb->save();
        if ($request->has('images') && $images = $request->file('images')) {
            $sb->images()->delete();
            foreach ($images as $image) {
                $link = $image->store('images');
                \App\Image::create([
                    'link' => $link,
                    'parent_id' => $sb->id,
                    'type' => 'entrproject'
                ]);
            }
        }
        return back()->with('success', 'Votre projet entrepreneurials est modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProProjects  $proProjects
     * @return \Illuminate\Http\Response
     */
    public function destroy($proProjects)
    {
        $sb = EntrProjects::findOrFail($proProjects);
        $sb->images()->delete();
        $sb->delete();
        return redirect('/entrproject');
    }
}
