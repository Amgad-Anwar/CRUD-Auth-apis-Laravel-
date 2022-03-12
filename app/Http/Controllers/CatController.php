<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatController extends Controller
{

    public function addCat(){
        return view('cats/add_cat');
    }

    public function store( Request $request){

        $request->validate(
            [
                'name'=>'required | max:50',
                'desc'=>'required ',
                'img'=>'required |image',
            ]
        );

        $imgPath = Storage::putFile('cats' , $request->img);

        Cat::create([
            'name'=>$request->name,
            'desc'=>$request->desc,
            'img'=>$imgPath,
        ]);

        return view('cats/add_cat');

    }

    public function index(){

        $cats = Cat::all();

        return view('cats/index' , [
            'cats' =>$cats
        ]);
    }

    public function delete($id){

        $cat = Cat::findOrFail($id);
        Storage::delete($cat->img);
        $cat->delete();
        return back();


    }

    public function show($id){

        $cat = Cat::findOrFail($id);

        return view('cats/edit_form' ,[
            "cat"=>$cat
        ]);
    }

    public function update($id, Request $request){

        $cat = Cat::findOrFail($id);
        $request->validate(
            [
                'name'=>'required | max:50',
                'desc'=>'required ',
                'img'=>'image',
            ]
        );

        if(! empty($request->img)){
        Storage::delete($cat->img);
        $imgPath = Storage::putFile('cats' , $request->img);
        }else{
            $imgPath=$cat->img;
        }

        $cat->update([
            'name'=>$request->name,
            'desc'=>$request->desc,
            'img'=>$imgPath,
        ]);

        return redirect(url('/cats'));

    }



}
