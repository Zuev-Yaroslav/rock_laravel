<?php

namespace App\Http\Requests\Api\Profile;

use Illuminate\Foundation\Http\FormRequest;

class   UpdateRequest extends FormRequest
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
            'gender' => 'nullable|integer',
            'role' => 'required|string',
            'birthed_at' => 'required|date_format:Y-m-d',
            'avatar_path' => 'nullable|string',
            'is_active' => 'required|boolean',
            'first_name' => 'required|string',
            'second_name' => 'nullable|string',
            'third_name' => 'nullable|string',
            'login' => 'nullable|string|unique:profiles,login,'. $this->profile->id,
        ];
    }
}

