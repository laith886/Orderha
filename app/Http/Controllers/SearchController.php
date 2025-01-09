<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function Search(Request $request){

        $element=$request->input('element');
        $type=$request->input('type');
        if($type=='product'){
            $result=Product::where('name','like', "%{$element}%")->
            orWhere('description', 'like', "%{$element}%")->
            get();
        }elseif ($type=='store'){
            $result=Store::where('name','like', "%{$element}%")->
            orWhere('description', 'like', "%{$element}%")->
            get();
        }else{
            return response()->json(['message'=>'invalid error']);
        }
        return response()->json($result);
    }



}
