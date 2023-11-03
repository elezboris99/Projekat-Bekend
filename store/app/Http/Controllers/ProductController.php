<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return (ProductResource::collection($products));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:40',
            'description' => 'required|string|max:200',
            'price' => 'required',
            'quantity' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $product =Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity
        ]);

        return response()->json(["Uspesno dodan proizvod",new ProductResource($product)]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {

       return new ProductResource($product);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:40',
            'description' => 'required|string|max:200',
            'price' => 'required',
            'quantity' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;

        $product->save();
        return response()->json(["Uspesno izmenjen proizvod!",  new ProductResource($product)]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json("Proizvod je izbrisan!");
    }
}
