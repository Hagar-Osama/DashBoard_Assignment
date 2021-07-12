<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = About::select('id', 'title', 'link', 'description')->get();
        return view('abouts.index',['abouts'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('abouts.create');

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
            'title'=>'required|string|max:255|min:3|unique:pages,name',
            'link'=>'required|string|max:255|min:3|url',
             'description'=> 'required|string',
             'status'=> 'required|in:on,off'

        ]);
        About::create($request->except(['_token']));
        return redirect()->route('abouts.index')->with('success', 'About Has Been Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = About::findorfail($id);
       // dd($about);
       // return redirect()->route('abouts.index');
       return view('abouts.show', ['about' => $row]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = About::find($id);
        return view('abouts.edit', ['about'=>$row]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
                //validations
                $request->validate([
                    'title'=>'required|string|max:255|min:3|unique:pages,name',
                    'link'=>'required|string|max:255|min:3|url',
                     'description'=> 'required|string',
                     'status'=> 'required|in:on,off'

                ]);
                $row = About::find($id);
                $row->update($request->except(['_token','_method']));
                return redirect()->route('abouts.index',['about'=>$row->id])->with('success', 'About Has Been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($row = About::find($id)) {
            $row->delete();
            return redirect()->route('abouts.index')->with('success', 'About Has Been Deleted Successfully');
        }
        return abort('404');
    }
}
