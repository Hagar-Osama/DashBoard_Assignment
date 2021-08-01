<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Validator;


class ApiServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return ServiceResource::collection($services);
    }

    public function show($id)
    {
        $service = Service::findorfail($id);
        return new ServiceResource($service);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name'=>'required|string|max:255|min:3|unique:services,name',
            'icon'=>'required|string|max:255|min:3',
             'description'=> 'required|string',
             'status'=> 'required|in:on,off'

        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors());
        }
        Service::create($request->except(['_token']));
        return response()->json('Data Has Been Stored Successfully');

    }


}
