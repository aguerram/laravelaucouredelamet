<?php

namespace App\Http\Controllers\Admin;

use App\Image;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', compact('snames'));
    }

    public function index()
    {
        $projects = Project::with(['images'])->orderBy('id','desc')->get();
        return view('admin.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.project.create'/*,compact('projects')*/);
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
            'title' => 'required|min:4|max:191|unique:projects',
            'content' => 'required|min:4',
            'images.*'=>'required|image',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date'
        ], [
            'end_date.after' => 'Date de fin doit être aprés date de fin',
            'images.*.image'=>'Seuls les fichiers image sont autorisés'
        ]);

        $prjt = Project::create($request->only([
            'title', 'content', 'start_date', 'end_date'
        ]));

        if($request->has('images') && $images = $request->file('images'))
        {
            foreach ($images as $image)
            {
                $link = $image->store('images');
                Image::create([
                    'link'=>$link,
                    'parent_id'=>$prjt->id,
                ]);
            }
        }
        return redirect('/admin/project');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.project.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prjt = Project::findOrFail($id);

        $request->validate([
            'title' => 'required|min:4|max:255|unique:projects,title,'.$id,
            'content' => 'required|min:4',
            'images.*'=>'required|image',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date'
        ], [
            'end_date.after' => 'Date de fin doit être aprés date de fin',
            'images.*.image'=>'Seuls les fichiers image sont autorisés'
        ]);

        $prjt->title = $request->title;
        $prjt->start_date = $request->start_date;
        $prjt->end_date = $request->end_date;
        $prjt->content = $request->input('content');
        $prjt->save();
        if($request->has('images') && $images = $request->file('images'))
        {
            foreach ($images as $image)
            {
                $link = $image->store('images');
                Image::create([
                    'link'=>$link,
                    'parent_id'=>$prjt->id,
                ]);
            }
        }
        return redirect('/admin/project');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prjt = Project::findOrFail($id);
        $prjt->delete();

        return back();
    }
}
