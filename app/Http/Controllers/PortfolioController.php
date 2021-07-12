<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;


class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Portfolio::select('id', 'name', 'description')->get();
        return view('portfolios.index',['portfolios'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('portfolios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd($request);
        //validations
        $request->validate([
            'name'=>'required|string|max:255|min:3|unique:portfolio,name',
             'description'=> 'required|string|max:255|min:5',
             'status'=> 'required|in:on,off'

        ]);
        Portfolio::create($request->except(['_token']));
        return redirect()->route('portfolios.index')->with('success', 'Portfolio Has Been Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $row = Portfolio::findorfail($id);
       // dd($id);
       // return redirect()->route('portfolios.index');
       return view('portfolios.show', ['portfolio' => $row]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $row = Portfolio::find($id);
        return view('portfolios.edit', ['portfolio'=>$row]);
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
       // dd($request);
        //validations
        $request->validate([
            'name'=>'required|string|max:255|min:3|unique:portfolios,name',
             'description'=> 'required|string',
             'status'=> 'required|in:on,off'

        ]);
        $row = Portfolio::find($id);
        $row->update($request->except(['_token','_method']));
        return redirect()->route('portfolios.index',['portfolio'=>$row->id])->with('success', 'Portfolio Has Been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($row = Portfolio::find($id)) {
            $row->delete();
            return redirect()->route('portfolios.index')->with('success', 'Portfolio Has Been Deleted Successfully');
        }
        return abort('404');
    }
}
