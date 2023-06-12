<?php
use App\Models\Payment;
use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PaymentController extends Controller
{
    public function payForQuote(Request $request)
    {
        // Retrieve the quote ID from the request
        $quoteId = $request->input('quote_id');

        // Retrieve the quote associated with the provided ID
        $quote = Quote::find($quoteId);

        // Create a new payment record
        $payment = Payment::create([
            'user_id' => $request->user()->id,
            'quote_id' => $quote->id,
            'payment_amount' => $quote->quote_amount,
            'date_paid' => now(),
            'payment_method' => $request->input('payment_method'),
        ]);

        // Perform the payment process (e.g., charge the user's credit card)

        // Update the status of the quote
        $quote->status = 'paid';
        $quote->save();

        return response()->json([
            'message' => 'Payment successful',
            'payment' => $payment,
        ]);
    }
}

?>