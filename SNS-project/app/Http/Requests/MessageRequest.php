<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
{
    public function authorize()
    {
        // Add authorization logic here if needed
        // For example, you can check if the authenticated user has permission to send a message
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'required|integer',
            'artisan_id' => 'required|integer',
            'request_id' => 'required|integer',
            'message_text' => 'required|string',
        ];
    }
}


?>