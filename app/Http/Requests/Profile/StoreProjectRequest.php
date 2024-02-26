<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'images' => ['required', 'json'],
            'excerpt' => ['nullable', 'string'],
            'date_service_from' => ['nullable', 'date'],
            'date_service_to' => ['nullable', 'date'],
            'region' => ['nullable', 'string'],
            'tip' => ['nullable', 'string'],
            'teg' => ['nullable', 'json'],
            'tema' => ['nullable', 'string'],
            'tel' => ['nullable', 'string'],
            'email' => ['nullable', 'string'],
            'name_proj' => ['nullable', 'string'],
            'video' => ['nullable', 'string'],
            'serch' => ['nullable', 'string'],
            'img1' => ['nullable', 'string', 'max:255'],
            'img2' => ['nullable', 'string', 'max:255'],
            'img3' => ['nullable', 'string', 'max:255'],
            'img4' => ['nullable', 'string', 'max:255'],
            'img5' => ['nullable', 'string', 'max:255'],
            'img6' => ['nullable', 'string', 'max:255'],
        ];
    }
}
