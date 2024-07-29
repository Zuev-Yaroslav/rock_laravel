<?php

namespace App\Http\Requests\Api\Profile;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
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
        return [
            'gender' => 'nullable|string',
            'birthed_at_from' => 'nullable|date_format:Y-m-d',
            'birthed_at_to' => 'nullable|date_format:Y-m-d',
            'first_name' => 'nullable|string',
            'second_name' => 'nullable|string',
            'third_name' => 'nullable|string',
            'login' => 'nullable|string',
            'roles' => 'nullable|array',
            'roles.*' => 'nullable|string',
        ];
    }
}
