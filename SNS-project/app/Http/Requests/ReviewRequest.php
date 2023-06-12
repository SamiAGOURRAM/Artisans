<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    public function authorize()
    {
        // Define the authorization rules for this request
        // For example, you can check if the current user has the necessary permissions to create/update a review
        return true;
    }

    public function rules()
    {
        // Define the validation rules for this request
        return [
            'artisan_id' => 'required|exists:Artisans,artisan_id',
        ];
    }
}
