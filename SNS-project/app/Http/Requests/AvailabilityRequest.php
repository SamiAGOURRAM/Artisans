<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AvailabilityRequest extends FormRequest
{
    public function authorize()
    {
        // Define the authorization rules for this request
        // For example, you can check if the current user has the necessary permissions to create/update an availability
        return true;
    }

    public function rules()
    {
        // Define the validation rules for this request
        return [
            'artisan_id' => 'required|exists:Artisans,artisan_id',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ];
    }
}
