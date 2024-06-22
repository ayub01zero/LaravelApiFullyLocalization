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
      
        $model = [
            'name_en' => $validatedData['name_en'],
            'name_ku' => $validatedData['name_ku'],
            'name_ar' => $validatedData['name_ar'],
            'price_en' => $validatedData['price_en'],
            'price_ku' => $validatedData['price_ku'],
            'price_ar' => $validatedData['price_ar'],
            'description_en' => $validatedData['description_en'],
            'description_ku' => $validatedData['description_ku'],
            'description_ar' => $validatedData['description_ar'],
            'location_en' => $validatedData['location_en'],
            'location_ku' => $validatedData['location_ku'],
            'location_ar' => $validatedData['location_ar'],
            'state' => $validatedData['state'],
        ];
    
        $data = Data::create($model);
        return response()->json(['message' => 'Created successfully', 'data' => $data], 201);
    }
    
    

}
