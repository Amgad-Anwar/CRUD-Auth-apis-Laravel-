<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class productController extends Controller
{
    //

    function insert(){
        $s = new product();
        $s->name="toy";
        $s->price=200;
        $s->save();

        echo "done";
    }

    function select(){
        $s = product::all();
        foreach($s as $a){
            echo $a->name ,"<br>";
        };
        
    }
}
