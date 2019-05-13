<?php

namespace App\Http\Controllers\Admin;

use App\SubProject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubProjectController extends Controller
{
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
        //
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
        //
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
