<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Contact::select('id','name', 'email', 'phone')->get();
        return view ('contacts.index', ['contacts' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('contacts.create');
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
            'name'=>'required|string|max:255|min:3',
            'phone' => 'required|integer',
            'message' => 'required|string',
            'email' =>'required|string|max:255|unique:contacts,email'
        ]);
        Contact::create($request->except(['_token']));
        return redirect()->route('contacts.index')->with('success', 'Message Has been submitted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = Contact::findorfail($id);
        return view('contacts.show', ['contact' => $row]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Contact::find($id);
        return view('contacts.edit', ['contact' => $row]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($row = Contact::find($id)) {
            $request->validate([
                'name'=>'required|string|max:255|min:3|',
                'phone' => 'required|integer',
                'message' => 'required|string',
                'email' =>'required|string|email|max:255|unique:contacts,email,'.$id
            ]);
            $row->update($request->except(['_token']));
            return redirect()->route('contacts.index')->with('success', 'Message Has Been Updated Successfully');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($row = Contact::find($id)) {
            $row->delete();
            return redirect()->route('contacts.index')->with('success', 'Message Has Been Deleted Successfully');
        }
        return abort('404');

    }
}
