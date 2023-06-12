<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetArtisansService;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use App\Models\Artisan;

class ServiceController extends Controller
{
    public function index()
    {
        // Retrieve all services
        $services = Service::all();

        // Return the services as a JSON response
        return response()->json([
            'services' => $services
        ]);
    }

    public function getArtisans(GetArtisansService $request){
        $validatedData = $request->validated();
        $serviceId = $validatedData['service_id'];
        $artisans = Service::where('service_id', $serviceId)->get();
        return response()->json($artisans);
    }
    public function create(ServiceRequest $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validated();

        // Create a new service record
        $service = Service::create([
            'service_name' => $validatedData['service_name'],
            'service_description' => $validatedData['service_description'],
        ]);

        // Return a response indicating successful creation
        return response()->json([
            'message' => 'Service created successfully',
            'service' => $service
        ], 201);
    }

    public function update(ServiceRequest $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validated();

        // Find the service record by ID
        $service = Service::findOrFail($id);

        // Update the service record
        $service->update([
            'service_name' => $validatedData['service_name'],
            'service_description' => $validatedData['service_description'],
        ]);

        // Return a response indicating successful update
        return response()->json([
            'message' => 'Service updated successfully',
            'service' => $service
        ]);
    }

    public function delete($id)
    {
        // Find the service record by ID
        $service = Service::findOrFail($id);

        // Delete the service record
        $service->delete();

        // Return a response indicating successful deletion
        return response()->json([
            'message' => 'Service deleted successfully'
        ]);
    }
}
