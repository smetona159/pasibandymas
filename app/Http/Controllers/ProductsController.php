<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class ProductsController extends Controller
{
    public function Index()
    {
        $entiretable = Products::all();
        return response()->json($entiretable);
    }
    public function Show($id)
    {
        $data = Products::Find($id);
        if($data != null){
            return response()->json($data, 200);
        }
        return response()->json("That item does not exist", 400);
    }
    public function ItemByCategoryId($id)
    {
        $data = Products::where('category_id', $id)->get();
        if($data != "[]"){
            return response()->json($data,200);
        }
       return response()->json("Something wrong",400);
    }
    public function Store(Request $request)
    {
      //  $v = Validator::make($request->all(),[
        //    'title'=> 'required',
       // ]);
        //if($v->fails()){
        //    return response()->json("Data is incorrect", 400);
       // }
        $product = new Products();
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
