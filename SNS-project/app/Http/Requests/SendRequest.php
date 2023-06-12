<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust the authorization logic as needed
    }

    public function rules()
    {
        return [
            'user_id' => 'required|integer',
            'service_id' => 'required|integer',
            'description' => 'required|string',
            'location' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'The user ID is required.',
            'user_id.integer' => 'The user ID must be an integer.',
            'service_id.required' => 'The service ID is required.',
            'service_id.integer' => 'The service ID must be an integer.',
            'description.required' => 'The description is required.',
            'description.string' => 'The description must be a string.',
            'location.required' => 'The location is required.',
            'location.string' => 'The location must be a string.',
        ];
    }
}

?>