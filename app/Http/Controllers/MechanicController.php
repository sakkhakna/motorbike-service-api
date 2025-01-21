<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MechanicStoreRequest;
use App\Models\Mechanic;
use Illuminate\Http\Request;

class MechanicController extends Controller
{
    public function index()
    {
        $mechanics = Mechanic::all();
        return response()->json([
            'status' => 'success',
            'message' => 'Mechanics retrieved successfully',
            'data' => $mechanics
        ], 200);
    }

    public function show($id)
    {
        $mechanic = Mechanic::find($id);
        if ($mechanic) {
            return response()->json([
                'status' => 'success',
                'message' => 'Mechanic retrieved successfully',
                'data' => $mechanic
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Mechanic not found',
            ], 404);
        }
    }

    public function store(MechanicStoreRequest $mechanicStoreRequest)
    {
        $mechanic = Mechanic::create($mechanicStoreRequest->validated());
        return response()->json([
            'status' => 'success',
            'message' => 'Mechanic created successfully',
            'data' => $mechanic
        ], 201);
    }

    public function update(MechanicStoreRequest $mechanicStoreRequest, $id)
    {
        $mechanic = Mechanic::find($id);
        if ($mechanic) {
            $mechanic->update($mechanicStoreRequest->validated());
            return response()->json([
                'status' => 'success',
                'message' => 'Mechanic updated successfully',
                'data' => $mechanic
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Mechanic not found',
            ], 404);
        }
    }

    public function destroy($id)
    {
        $mechanic = Mechanic::find($id);
        if ($mechanic) {
            $mechanic->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Mechanic deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Mechanic not found',
            ], 404);
        }
    }
}
