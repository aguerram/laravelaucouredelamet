<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SavedName;
class SavedNamesController extends Controller
{
    public function __construct()
    {

        $this->middleware('admin',compact('snames'));
    }

    public function index()
    {
        $snames = SavedName::all();
        return view('admin.savednames.index',compact('snames'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.savednames.create');
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
            'name'=>'required|unique:saved_names'
        ],[
            'name.required'=>'le champ Nom Complet est requis !',
            'name.unique'=>$request->name.' est déjà pris.'
        ]);

        SavedName::create([
            'name'=>ucwords($request->name),
            'user_id'=>0
        ]);
        return redirect('/admin/membername/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sname = SavedName::findOrFail($id);
        return view('admin.savednames.edit',compact('sname'));
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
        $request->validate([
            'name'=>'required|unique:saved_names,name,'.$id
        ],[
            'name.required'=>'le champ Nom Complet est requis !',
            'name.unique'=>$request->name.' est déjà pris.'
        ]);
        $sname = SavedName::findOrFail($id);
        $sname->name = $request->name;
        $sname->save();
        if($sname->user_id > 0 )
        {
            $user = User::findOrFail($sname->user_id);
            $user->name = $request->name;
            $user->save();
        }
        return redirect('/admin/membername/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sname = SavedName::findOrFail($id);
        $sname->delete();
        return redirect('/admin/membername/');
    }
}
