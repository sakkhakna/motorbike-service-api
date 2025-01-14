<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerStoreRequest;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
//        $customers = Customer::all();
        $customers = Customer::with('motorbikes')->get();
        return response()->json([
            'status' => 'success',
            'message' => 'Customers retrieved successfully',
            'data' => $customers
        ], 200);
    }

public function show($id)
    {
//        $customer = Customer::find($id);
        $customer = Customer::with('motorbikes')->find($id);
        if ($customer) {
            return response()->json([
                'status' => 'success',
                'message' => 'Customer retrieved successfully',
                'data' => $customer
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Customer not found',
            ], 404);
        }
    }

    public function store(CustomerStoreRequest $customerStoreRequest)
    {
        $customer = Customer::create($customerStoreRequest->validated());
        return response()->json([
            'status' => 'success',
            'message' => 'Customer created successfully',
            'data' => $customer
        ], 201);
    }

//public function store(Request $request)
//{
//    $validator = Validator::make($request->all(), [
//        'name' => 'required|string',
//        'phoneNumber' => 'required|string|unique:customers,phoneNumber',
//    ]);
//
//    if ($validator->fails()) {
//        return response()->json([
//            'status' => 'error',
//            'message' => $validator->errors(),
//        ], 400);
//    }
//
//    $customer = Customer::create($request->all());
//    return response()->json([
//        'status' => 'success',
//        'message' => 'Customer created successfully',
//        'data' => $customer
//    ], 201);
//}

    public function update(CustomerStoreRequest $customerStoreRequest, $id)
    {
        $customer = Customer::find($id);
        if ($customer) {
            $customer->update($customerStoreRequest->validated());
            return response()->json([
                'status' => 'success',
                'message' => 'Customer updated successfully',
                'data' => $customer
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Customer not found',
            ], 404);
        }
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        if ($customer) {
            $customer->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Customer deleted successfully',
                'data' => $customer
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Customer not found',
            ], 404);
        }
    }
}
