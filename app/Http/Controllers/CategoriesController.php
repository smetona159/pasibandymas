<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function Index()
    {
        $entiretable = Categories::all();
        return response()->json($entiretable);
    }
    public function Store(Request $request)
    {
        $category = new Categories();
        $category->type = $request->type;
        if($category->type==""){
            return response()->json("Data is incorrect", 400);
        }
        $category->save();
        return response()->json($category, 201);
    }
}
