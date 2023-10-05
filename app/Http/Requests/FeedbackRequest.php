<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cover_letter'=>'required|string',
            'status'=>'integer',
            'user_id'=>'exists:users,id',
            'service_id'=>'exists:services,id',
            'role_name'=>'string|required'
        ];
    }
}
