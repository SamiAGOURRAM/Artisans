<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendQuoteRequest extends FormRequest
{
    public function authorize()
    {
        // Add authorization logic if needed
        return true;
    }

    public function rules()
    {
        return [
            'artisan_id' => 'required|integer',
            'request_id' => 'required|integer',
            'quote_amount' => 'required|numeric|min:0',
            'quote_description' => 'required|string',
            'date_quoted' => 'required|date',
            'status' => 'required|string',
        ];
    }
}

?>