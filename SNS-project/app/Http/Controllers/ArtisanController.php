<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArtisanRequest;
use App\Http\Requests\ReviewRequest;
use App\Models\Artisan;
use App\Models\ArtisanService;
use App\Models\Review;
use App\Models\Service;

class ArtisanController extends Controller
{

    public function getArtisan(ReviewRequest $request)
    {
        $validated_data = $request->validated();
        $artisanId = $validated_data['artisan_id'];
        // Calculate the mean rating for the specific artisan_id
        $meanRating = Review::where('artisan_id', $artisanId)->avg('rating');
        // Return the mean rating as a response
        $reviewCount = Review::where('artisan_id', $artisanId)->count();

        $services = Artisan::join('artisan_services', 'artisans.artisan_id', '=', 'artisan_services.artisan_id')
    ->join('services', 'artisan_services.service_id', '=', 'services.service_id')
    ->where('artisans.artisan_id', $artisanId)
    ->select('services.*')
    ->groupBy('services.service_id')
    ->get();

    $artisan = Artisan::where('artisan_id', $artisanId)->get();

        return response()->json([
        'artisan' => $artisan,
        'services' => $services,
        'mean_rating' => $meanRating,
        'review_count' => $reviewCount,
    ]);
    }
    
    public function create(ArtisanRequest $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validated();

        // Create a new artisan record
        $artisan = Artisan::where('user_id', $validatedData['user_id'])->first();

if (!$artisan) {
    // Artisan does not exist, create a new record
    $artisan = Artisan::create([
        'user_id' => $validatedData['user_id'],
        'company_name' => $validatedData['company_name'],
        'company_address' => $validatedData['company_address'],
        'description' => $validatedData['description'],
        'profile_picture' => $validatedData['profile_picture'],
    ]);
} else {
    // Artisan already exists, handle accordingly
    // Check if the service_id is associated with the artisan_id
    $artisanService = ArtisanService::where('artisan_id', $artisan->artisan_id)
        ->where('service_id', $validatedData['service_id'])
        ->first();

    if ($artisanService) {
        // Service is already associated with the artisan, return an error response
        return response()->json([
            'message' => 'Service already offered by the Artisan',
        ], 400);
    }

    // Service is not associated with the artisan, add the association to the service_artisans table
    ArtisanService::create([
        'artisan_id' => $artisan->artisan_id,
        'service_id' => $validatedData['service_id'],
    ]);
}


        // Return a response indicating successful creation
        return response()->json([
            'message' => 'Artisan created successfully',
            'artisan' => $artisan
        ], 201);
    }

    public function update(ArtisanRequest $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validated();

        // Find the artisan record by ID
        $artisan = Artisan::findOrFail($id);

        // Update the artisan record
        $artisan->update([
            'user_id' => $validatedData['user_id'],
            'company_name' => $validatedData['company_name'],
            'company_address' => $validatedData['company_address'],
            'description' => $validatedData['description'],
            'profile_picture' => $validatedData['profile_picture'],
        ]);

        // Return a response indicating successful update
        return response()->json([
            'message' => 'Artisan updated successfully',
            'artisan' => $artisan
        ]);
    }

    public function delete($id)
    {
        // Find the artisan record by ID
        $artisan = Artisan::findOrFail($id);

        // Delete the artisan record
        $artisan->delete();

        // Return a response indicating successful deletion
        return response()->json([
            'message' => 'Artisan deleted successfully'
        ]);
    }
}
