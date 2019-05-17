<?php

namespace App\Http\Controllers\Admin;

use App\ProProjects;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProProjectController extends Controller
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
        $sb = ProProjects::with(['user','images'])->orderBy('id','desc')->get();
        return view('admin.proprojects.index',compact('sb'));
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
        $sb = ProProjects::findOrFail($id);
        return view('admin.proprojects.show',compact('sb'));
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
        $sb = ProProjects::findOrFail($id);
        $sb->images()->delete();
        $sb->delete();
        return redirect('/admin/proproject/');
    }
    public function valider(Request $request,ProProjects $sb)
    {
        $sb->active = true;
        $sb->save();
        return back();
    }
}
