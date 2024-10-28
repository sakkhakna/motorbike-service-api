<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Dotenv\Validator;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return response()->json([
            'status' => 'success',
            'message' => 'Products retrieved successfully',
            'data' => $products
        ], 200);
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
//    public function store(ProductStoreRequest $productStoreRequest)
//    {
//        $product = Product::create($productStoreRequest->validated());
//        return response()->json([
//            'status' => 'success',
//            'message' => 'Product created successfully',
//            'data' => $product
//        ], 201);
//    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product' => 'required|string',
            'from' => 'required|string',
            'price_baht' => 'required|numeric',
            'price_dong' => 'required|numeric',
            'price_usd' => 'required|numeric',
            'profit' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'status' => 'required|boolean',
            'quantity' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $product = Product::create($request->all());
        return response()->json([
            'status' => 'success',
            'message' => 'Product created successfully',
            'data' => $product
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::find($id);
        return response()->json([
            'status' => 'success',
            'message' => 'Product retrieved successfully',
            'data' => $product
        ], 200);
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
    public function update(ProductStoreRequest $productStoreRequest, $id)
    {
        $product = Product::find($id);
        $product->update($productStoreRequest->validated());
        return response()->json([
            'status' => 'success',
            'message' => 'Product updated successfully',
            'data' => $product
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Product deleted successfully',
            'data' => $product
        ], 200);
    }
}
