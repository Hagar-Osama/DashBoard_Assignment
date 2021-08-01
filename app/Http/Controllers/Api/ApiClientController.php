<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;

class ApiClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return ClientResource::collection($clients);
    }
    public function show($id)
    {
        $client = Client::findorfail($id);
        return new ClientResource($client);
    }
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name'=>'required|string|max:255|min:3|unique:clients,name',

        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors());
        }
        Client::create($request->except(['_token']));
        return response()->json('Data Has Been Stored Successfully');

    }
}
