<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    public function authorize()
    {
        // Define the authorization rules for this request
        // For example, you can check if the current user has the necessary permissions to create/update a service
        return true;
    }

    public function rules()
    {
        // Define the validation rules for this request
        return [
            'service_name' => 'required|string|max:255',
            'service_description' => 'nullable|string',
        ];
    }
}
