<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MotorbikeStoreRequest;
use App\Models\Motorbike;
use Illuminate\Http\Request;

class MotorbikeController extends Controller
{
    public function index()
    {
        $motorbikes = Motorbike::all();
        return response()->json([
            'status' => 'success',
            'message' => 'Motorbikes retrieved successfully',
            'data' => $motorbikes
        ], 200);
    }

    public function show($id)
    {
        $motorbike = Motorbike::find($id);
        if ($motorbike) {
            return response()->json([
                'status' => 'success',
                'message' => 'Motorbike retrieved successfully',
                'data' => $motorbike
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Motorbike not found',
            ], 404);
        }
    }

    public function store(MotorbikeStoreRequest $motorbikeStoreRequest)
    {
        $motorbike = Motorbike::create($motorbikeStoreRequest->validated());
        return response()->json([
            'status' => 'success',
            'message' => 'Motorbike created successfully',
            'data' => $motorbike
        ], 201);
    }

    public function update(MotorbikeStoreRequest $motorbikeStoreRequest, $id)
    {
        $motorbike = Motorbike::find($id);
        if ($motorbike) {
            $motorbike->update($motorbikeStoreRequest->validated());
            return response()->json([
                'status' => 'success',
                'message' => 'Motorbike updated successfully',
                'data' => $motorbike
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Motorbike not found',
            ], 404);
        }
    }

    public function destroy($id)
    {
        $motorbike = Motorbike::find($id);
        if ($motorbike) {
            $motorbike->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Motorbike deleted successfully',
                'data' => $motorbike
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Motorbike not found',
            ], 404);
        }
    }
}
