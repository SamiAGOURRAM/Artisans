<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtisanRequest extends FormRequest
{
    public function authorize()
    {
        // Define the authorization rules for this request
        // For example, you can check if the current user has the necessary permissions to create/update an artisan
        return true;
    }

    public function rules()
    {
        // Define the validation rules for this request
        return [
            'user_id' => 'required|integer',
            'company_name' => 'required|string|max:255',
            'company_address' => 'required|string|max:255',
            'description' => 'nullable|string',
            'profile_picture' => 'nullable|string|max:255',
            'service_id' => 'required|integer'
        ];
    }
}
