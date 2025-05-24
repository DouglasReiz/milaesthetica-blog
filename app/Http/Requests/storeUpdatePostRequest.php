<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeUpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $rules = [
            'title' => 'required|string|max:100|min:3',
            'content' => 'required|string|min:3',
            'image' => 'nullable|file|mimes:jpeg,jpg,png,svg',
            'user_id' => 'required|integer|exists:users,id'
        ];

        if ($this->method() == 'PUT') {
            $rules = [
                'title' => 'required|string|max:100|min:3',
                'content' => 'required|string|min:3',
                'image' => 'nullable|file|mimes:jpeg,jpg,png,svg',
                'user_id' => 'required|integer|exists:users,id'
            ];
        }

        return $rules;
    }
}
