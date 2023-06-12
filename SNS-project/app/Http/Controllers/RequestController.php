<?php
namespace App\Http\Controllers;

use App\Http\Requests\SendRequest;
use App\Models\Request;


class RequestController extends Controller
{
    public function index()
    {
        $requests = Request::all();

        return response()->json([
            'requests' => $requests,
        ]);
    }

    public function store(SendRequest $request)
    {
        $newRequest = Request::create([
            'user_id' => $request->input('user_id'),
            'service_id' => $request->input('service_id'),
            'description' => $request->input('description'),
            'date_requested' => now(),
            'status' => 'pending',
            'location' => $request->input('location'),
        ]);

        return response()->json([
            'message' => 'Request created successfully',
            'request' => $newRequest,
        ]);
    }
}

?>