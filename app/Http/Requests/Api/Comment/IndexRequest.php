<?php

namespace App\Http\Requests\Api\Comment;

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
            'content' => 'nullable|string',
            'profile_login' => 'nullable|string',
            'commentable_type' => 'nullable|string',
            'commentable_title' => 'nullable|string',
            'post_content' => 'nullable|string',
            'created_at_from' => 'nullable|date_format:Y-m-d H:i:s',
            'created_at_to' => 'nullable|date_format:Y-m-d H:i:s',
        ];
    }
}
