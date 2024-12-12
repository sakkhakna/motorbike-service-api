<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceStoreRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return response()->json([
            'status' => 'success',
            'message' => 'Services retrieved successfully',
            'data' => $services
        ], 200);
    }

    public function show($id)
    {
        $service = Service::find($id);
        if ($service) {
            return response()->json([
                'status' => 'success',
                'message' => 'Service retrieved successfully',
                'data' => $service
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Service not found',
            ], 404);
        }
    }

    public function store(ServiceStoreRequest $serviceStoreRequest)
    {
        $service = Service::create($serviceStoreRequest->validated());
        return response()->json([
            'status' => 'success',
            'message' => 'Service created successfully',
            'data' => $service
        ], 201);
    }

    public function update(ServiceStoreRequest $serviceStoreRequest, $id)
    {
        $service = Service::find($id);
        if ($service) {
            $service->update($serviceStoreRequest->validated());
            return response()->json([
                'status' => 'success',
                'message' => 'Service updated successfully',
                'data' => $service
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Service not found',
            ], 404);
        }
    }

    public function destroy($id)
    {
        $service = Service::find($id);
        if ($service) {
            $service->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Service deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Service not found',
            ], 404);
        }
    }
}
