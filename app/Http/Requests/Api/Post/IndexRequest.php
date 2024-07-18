<?php

namespace App\Http\Requests\Api\Post;

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
            'title' => 'nullable|string',
            'content' => 'nullable|string',
            'description' => 'nullable|string',
            'published_at_from' => 'nullable|date_format:Y-m-d',
            'published_at_to' => 'nullable|date_format:Y-m-d',
            'profile_login' => 'nullable|string',
            'category_title' => 'nullable|string'
        ];
    }
}
