<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvailabilityRequest;
use App\Models\Artisan;
use App\Models\Availability;

class AvailabilityController extends Controller
{
    public function create(AvailabilityRequest $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validated();

        // Create a new availability record
        $availability = Availability::create([
            'artisan_id' => $validatedData['artisan_id'],
            'date' => $validatedData['date'],
            'start_time' => $validatedData['start_time'],
            'end_time' => $validatedData['end_time'],
        ]);

        // Return a response indicating successful creation
        return response()->json([
            'message' => 'Availability created successfully',
            'availability' => $availability
        ], 201);
    }

    public function update(AvailabilityRequest $request)
{
    // Validate the incoming request data
    $validatedData = $request->validated();
    
    // Get the availability ID from the request
    $availabilityId = $request->input('id');

    // Find the availability record by ID
    $availability = Availability::findOrFail($availabilityId);

    // Update the availability record
    $availability->update([
        'date' => $validatedData['date'],
        'start_time' => $validatedData['start_time'],
        'end_time' => $validatedData['end_time'],
    ]);

    // Return a response indicating successful update
    return response()->json([
        'message' => 'Availability updated successfully',
        'availability' => $availability
    ]);
}


    public function delete($id)
    {
        // Find the availability record by ID
        $availability = Availability::findOrFail($id);

        // Delete the availability record
        $availability->delete();

        // Return a response indicating successful deletion
        return response()->json([
            'message' => 'Availability deleted successfully'
        ]);
    }

    public function getByArtisan($artisanId)
    {
        // Find the artisan by ID
        $artisan = Artisan::findOrFail($artisanId);

        // Retrieve all availabilities for the artisan
        $availabilities = $artisan->availabilities;

        // Return a response with the availabilities
        return response()->json([
            'availabilities' => $availabilities
        ]);
    }
}
