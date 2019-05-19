<?php

namespace App\Http\Controllers\Admin;

use App\Image;
use App\SubProject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubProjectController extends Controller
{
    public function __construct()
    {

        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sb = SubProject::with(['user','project','images'])->orderBy('id','desc')->get();
        return view('admin.subprojects.index',compact('sb'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sb = SubProject::findOrFail($id);
        return view('admin.subprojects.show',compact('sb'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = SubProject::findOrFail($id);
        return view('admin.subprojects.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prjt = SubProject::findOrFail($id);

        $request->validate([
            'title' => 'required|min:4|max:255|unique:projects,title,'.$id,
            'content' => 'required|min:4',
            'images.*'=>'required|image',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date'
        ], [
            'end_date.after' => 'Date de fin doit être aprés date de début',
            'images.*.image'=>'Seuls les fichiers image sont autorisés'
        ]);

        $prjt->title = $request->title;
        $prjt->start_date = $request->start_date;
        $prjt->end_date = $request->end_date;
        $prjt->content = $request->input('content');

        if($request->has('images') && $images = $request->file('images'))
        {
            $prjt->images()->delete();
            foreach ($images as $image)
            {
                $link = $image->store('images');
                Image::create([
                    'link'=>$link,
                    'parent_id'=>$prjt->id,
                    'type'=>'subproject'
                ]);
            }
        }

        $prjt->save();
        return redirect('/admin/subproject');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sb = SubProject::findOrFail($id);
        $sb->delete();
        return redirect('/admin/subproject/');
    }
    public function valider(Request $request,SubProject $sb)
    {
        $sb->active = true;
        $sb->save();
        return back();
    }
}
