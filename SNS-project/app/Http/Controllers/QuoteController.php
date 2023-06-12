<?php
namespace App\Http\Controllers;

use App\Http\Requests\SendQuoteRequest;
use App\Models\Quote;
use App\Models\User;
use App\Models\Notification;
use App\Models\Artisan;


class QuoteController extends Controller
{
    public function store(SendQuoteRequest $request)
    {
        $quote = Quote::create([
            'artisan_id' => $request->input('artisan_id'),
            'request_id' => $request->input('request_id'),
            'quote_amount' => $request->input('quote_amount'),
            'quote_description' => $request->input('quote_description'),
            'date_quoted' => $request->input('date_quoted'),
            'status' => $request->input('status'),
        ]);

        $user = User::find($request->input('user_id'));
        $artisan = Artisan::find($request->input('artisan_id'));
        $artisan_user = User::fin($artisan->user_id);


        // Create a notification entry for the user and the artisan.
        Notification::create([
            'user_id' => $user->id,
            'message' => 'You have received a new quote from :'.$artisan_user->name,
            'date_sent' => now(),
            'is_read' => false,
        ]);

        Notification::create([
            'user_id' => $artisan->user_id,
            'message' => 'You have sent a new quote to :'.$user->user_id,
            'date_sent' => now(), 
            'is_read' => false,
        ]);

        


        // You can perform any additional logic here, such as sending notifications or updating the request status

        return response()->json([
            'message' => 'Quote sent successfully',
            'quote' => $quote,
        ]);
    }

    public function show($id)
    {
        $quote = Quote::findOrFail($id);

        return response()->json([
            'quote' => $quote,
        ]);
    }

    public function update(SendQuoteRequest $request, $id)
    {
        $quote = Quote::findOrFail($id);

        $quote->update([
            'quote_amount' => $request->input('quote_amount'),
            'quote_description' => $request->input('quote_description'),
            'date_quoted' => $request->input('date_quoted'),
            'status' => $request->input('status'),
        ]);

        return response()->json([
            'message' => 'Quote updated successfully',
            'quote' => $quote,
        ]);
    }

    public function destroy($id)
    {
        $quote = Quote::findOrFail($id);
        $quote->delete();

        return response()->json([
            'message' => 'Quote deleted successfully',
        ]);
    }
}

?>