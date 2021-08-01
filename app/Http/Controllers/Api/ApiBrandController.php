<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Brand;
use App\Http\Resources\BrandResource;


class ApiBrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return BrandResource::collection($brands);
    }
    public function show($id)
    {
        $brand = Brand::findorfail($id);
        return new BrandResource($brand);
    }
    public function store(Request $request)
    {
       // dd($request->all());
        if ($request->hasfile('image')) {
        $validate = Validator::make($request->all(),[
            'image' => 'image|mimes:png,jpg,svg,gif|max:2048'
        ]);
        $image = $request->file('image');
        $image_name = rand(). '.' .$image->getClientOriginalExtension();
        $image->move('images/brands', $image_name);

        if ($validate->fails()) {
            return response()->json($validate->errors());
        }
        Brand::create([
            "image" =>$image_name

        ]);
    }
        return response()->json('Data Has Been Stored Successfully');

    }
}
