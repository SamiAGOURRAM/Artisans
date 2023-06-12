<?php
namespace App\Http\Controllers;

use App\Http\Requests\GetArtisansService;
use Illuminate\Http\Request;
use App\Models\ArtisanService;
use App\Models\Artisan;
class ArtisansServiceController extends Controller
{
    public function index()
    {
        // Retrieve all artisan services
        $artisanServices = ArtisanService::all();

        // Return the artisan services as a response
        return response()->json($artisanServices);
    }

    public function showByService(GetArtisansService $request)
{
    $validatedData = $request->validated();
    $serviceId = $validatedData['service_id'];

    // Retrieve artisan services based on the provided service ID
    $artisanServices = ArtisanService::where('service_id', $serviceId)->get();
    $artisanIds = $artisanServices->pluck('artisan_id')->all();
    $artisans = Artisan::whereIn('artisan_id', $artisanIds)->get();

    // Return the artisan services as a response
    return response()->json($artisans);
}


    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'artisan_id' => 'required|integer',
            'service_id' => 'required|integer',
        ]);

        // Create a new artisan service record
        $artisanService = ArtisanService::create($validatedData);

        // Return the created artisan service as a response
        return response()->json($artisanService, 201);
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'artisan_id' => 'required|integer',
            'service_id' => 'required|integer',
        ]);

        // Retrieve the artisan service by ID
        $artisanService = ArtisanService::findOrFail($id);

        // Update the artisan service record
        $artisanService->update($validatedData);

        // Return the updated artisan service as a response
        return response()->json($artisanService);
    }

    public function destroy($id)
    {
        // Retrieve the artisan service by ID
        $artisanService = ArtisanService::findOrFail($id);

        // Delete the artisan service record
        $artisanService->delete();

        // Return a success message as a response
        return response()->json(['message' => 'Artisan service deleted successfully']);
    }
}

?>