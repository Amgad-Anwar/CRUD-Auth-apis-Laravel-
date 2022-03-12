<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatResource;
use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiCatController extends Controller
{

    public function index()
    {

        $cats = Cat::all();
        return CatResource::collection($cats);
    }

    public function show($id)
    {

        $cat = Cat::find($id);

        if ($cat == null) {
            return response()->json([
                "error" => "not found",
            ], 404);
        }

        return new CatResource($cat);
    }

    public function delete($id)
    {

        $cat = Cat::find($id);

        if ($cat == null) {
            return response()->json([
                "error" => "not found",
            ], 404);
        }
        Storage::delete($cat->img);

        $cat->delete();

        return response()->json([
            "deleted" => "success",
        ], 200);
    }

    public function store(Request $request)
    {


        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required | max:50',
                'desc' => 'required ',
                'img' => 'required |image',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "errors" => $validator->errors(),
            ], 200);
        }

        $imgPath = Storage::putFile('cats', $request->img);

        $cat = Cat::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'img' => $imgPath,
        ]);


        return new CatResource($cat);
    }

    public function update($id, Request $request)
    {


        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required | max:50',
                'desc' => 'required ',
                'img' => 'image',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "errors" => $validator->errors(),
            ], 200);
        }

        $cat = Cat::find($id);

        if ($cat == null) {
            return response()->json([
                "error" => "not found",
            ], 404);
        }

        if(! empty($request->img)){
         Storage::delete($cat->img);
         $imgPath = Storage::putFile('cats', $request->img);
        }else{

        $imgPath =  $cat->img;

        }


        $cat->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'img' => $imgPath,
        ]);


        return new CatResource($cat);
    }
}
