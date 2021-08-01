<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Http\Resources\PageResource;
use Illuminate\Support\Facades\Validator;


class ApiPageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
       // return response()->json($pages);
       //or use resource to return data
       return PageResource::collection($pages);
    }

    public function show($id)
    {
        $page = Page::findorfail($id);
        return new PageResource($page);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name' => 'required|string|max:255|min:3|unique:pages,name',
            'link' => 'required|string|max:255|min:3|url',
            'order' => 'required|numeric|integer',
            'status' => 'required|in:on,off'
        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors());
        }
        Page::create($request->except(['_token']));
        return response()->json('Data Has Been Stored Successfully');

    }
}
