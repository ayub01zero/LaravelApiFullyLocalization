<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Http\Resources\DataResource;
use App\Http\Requests\DataRequest;




class DataController extends Controller
{
    public function show($id)
    {
        $product = Data::findOrFail($id);
        return new DataResource($product);
    }
    
    public function index()
    {
        $products = Data::all();
        return DataResource::collection($products);
    }


    public function store(DataRequest $request)
    {
        $validatedData = $request->validated();
    
        $product = new Data();
    
        // Assign validated data to product fields
        foreach ($validatedData as $key => $value) {
            $product->$key = $value;
        }
    
        $product->save();
    
        return response()->json("Created successfully", 201);
    }
    

}
