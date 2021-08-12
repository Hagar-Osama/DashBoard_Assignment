<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Contact;
use App\Http\Resources\ContactResource;


class ApiContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return ContactResource::collection($contacts);


    }
    public function show($id)
    {
        $contact = Contact::findorfail($id);
        return new ContactResource($contact);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name'=>'required|string|max:255|min:3',
            'phone' => 'required|integer',
            'message' => 'required|string',
            'email' =>'required|string|email|max:255|unique:contacts,email'
        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors());
        }
        Contact::create($request->except(['_token']));
        return response()->json('Data Has Been Stored Successfully');

    }
    public function update(Request $request, $id)
    {
        if ($row = Contact::find($id)) {
            $validate = Validator::make($request->all(),[
                'name'=>'required|string|max:255|min:3',
                'phone' => 'required|integer',
                'message' => 'required|string',
                'email' =>'required|string|email|max:255|unique:contacts,email,'.$id
            ]);
            if ($validate->fails()) {
                return response()->json($validate->errors());
            }
            $row->update($request->all());
            return response()->json('Data Has Been Updated Successfully');

        }
    }

    public function destroy($id)
    {
        if ($row = Contact::find($id)) {
            $row->delete();
            return response()->json('Data Has Been Deleted Successfully');
        }
        return response()->json('Data Has Not Been Found');
    }


}
