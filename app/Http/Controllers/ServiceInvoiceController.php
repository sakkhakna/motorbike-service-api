<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceInvoiceController extends Controller
{
    public function index()
    {
        $serviceInvoices = ServiceInvoice::all();
        return response()->json([
            'status' => 'success',
            'message' => 'Service Invoices retrieved successfully',
            'data' => $serviceInvoices
        ], 200);
    }

    public function show($id)
    {
        $serviceInvoice = ServiceInvoice::find($id);
        if ($serviceInvoice) {
            return response()->json([
                'status' => 'success',
                'message' => 'Service Invoice retrieved successfully',
                'data' => $serviceInvoice
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Service Invoice not found',
            ], 404);
        }
    }

    public function store(ServiceInvoiceStoreRequest $serviceInvoiceStoreRequest)
    {
        $serviceInvoice = ServiceInvoice::create($serviceInvoiceStoreRequest->validated());
        return response()->json([
            'status' => 'success',
            'message' => 'Service Invoice created successfully',
            'data' => $serviceInvoice
        ], 201);
    }

    public function update(ServiceInvoiceStoreRequest $serviceInvoiceStoreRequest, $id)
    {
        $serviceInvoice = ServiceInvoice::find($id);
        if ($serviceInvoice) {
            $serviceInvoice->update($serviceInvoiceStoreRequest->validated());
            return response()->json([
                'status' => 'success',
                'message' => 'Service Invoice updated successfully',
                'data' => $serviceInvoice
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Service Invoice not found',
            ], 404);
        }
    }

    public function destroy($id)
    {
        $serviceInvoice = ServiceInvoice::find($id);
        if ($serviceInvoice) {
            $serviceInvoice->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Service Invoice deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Service Invoice not found',
            ], 404);
        }
    }
}
