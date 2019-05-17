<?php

namespace App\Http\Controllers\Admin;

use App\EntrProjects;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EntrProjectController extends Controller
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
        $sb = EntrProjects::with(['user','images'])->orderBy('id','desc')->get();
        return view('admin.entrprojects.index',compact('sb'));
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
        $sb = EntrProjects::findOrFail($id);
        return view('admin.entrprojects.show',compact('sb'));
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
        $sb = EntrProjects::findOrFail($id);
        $sb->images()->delete();
        $sb->delete();
        return redirect('/admin/entrproject/');
    }

    public function valider(Request $request,EntrProjects $sb)
    {
        $sb->active = true;
        $sb->save();
        return back();
    }
}
