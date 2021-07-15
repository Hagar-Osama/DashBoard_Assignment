<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Team::select('id', 'name', 'link')->get();
        return view('teams.index',['teams'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validations
        $request->validate([
            'name'=>'required|string|max:255|min:3|unique:teams,name',
            'link'=>'required|string|max:255|min:3|url',
             'job'=> 'required|string|max:255|min:3',
             'description'=> 'required|string',
             'status'=> 'required|in:on,off'

        ]);
        if ($request->hasfile('image')) {
            $request->validate([
                'image' =>

            ]);
        }
        Team::create($request->except(['_token', 'image']));
        return redirect()->route('teams.index')->with('success', 'team Has Been Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $row = Team::findorfail($id);
       // dd($id);
       // return redirect()->route('pages.index');
       return view('teams.show', ['team' => $row]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Team::find($id);
        return view('teams.edit', ['team'=>$row]);
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
        //validations
        $request->validate([
            'name'=>'required|string|max:255|min:3|unique:teams,name',
            'link'=>'required|string|max:255|min:3|url',
             'job'=> 'required|string|max:255|min:3',
             'description'=> 'required|string',
             'status'=> 'required|in:on,off'

        ]);
        $row = Team::find($id);
        $row->update($request->except(['_token','_method']));
        return redirect()->route('teams.index',['team'=>$row->id])->with('success', 'team Has Been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($row = Team::find($id)) {
            $row->delete();
            return redirect()->route('teams.index')->with('success', 'team Has Been Deleted Successfully');
        }
        return abort('404');

      //  if($row = Team::find($id)) {
       //     unlink($image->image_name);
       //     $row->delete();
       // }
    }
}
