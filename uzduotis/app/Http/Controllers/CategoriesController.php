<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $entiretable = Categories::all();
        return response()->json($entiretable);
    }
    public function store(Request $request)
    {
        $count =0;
        $data = Categories::all();
        foreach ($data as $datum) {
            $count++;
        }
        $category = new Categories();
        $category->id = $count+1;
        $category->type = $request->type;
        if($category->type==""){
            return response()->json("Data is incorrect", 400);
        }
        $category->save();
        return response()->json($category, 201);
    }
}
