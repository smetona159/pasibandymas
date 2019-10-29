<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class ProductsController extends Controller
{
    public function index()
    {
        $entiretable = Products::all();
        return response()->json($entiretable);
    }
    public function indexByCategory($id)
    {
        $items = Products::all();
        $data = array();
        foreach ($items as $item){
            if($item->category_id==$id){
                array_push($data, $item);
            }
        }
       return response()->json($data);
    }
    public function store(Request $request)
    {
        $count =0;
        $data = Products::all();
        foreach ($data as $datum) {
            $count++;
        }
        $product = new Products();
        $product->id = $count+1;
        $product->title = $request->title;
        $product->amount = $request->amount;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        if($product->category_id =='' || $product->title =="" || $product->amount =='' || $product->price ==''){
            return response()->json("Data is incorrect", 400);
        }
        $product->save();
        return response()->json($product , 201);
    }
}
