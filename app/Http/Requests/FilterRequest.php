<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
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
            'name' => 'string',
            'text' => 'string',
            'date' => '',
            'rubrica' => '',
            'glav' => '',
            'created_at' =>'',
            'year' => '',
            'month' => '',
            'date_service_from' => '',
            'tip' => '',
            'project' =>'',
            'tema' =>'',
            'teg' =>'',
            'role' => '',
        ];
    }
}
