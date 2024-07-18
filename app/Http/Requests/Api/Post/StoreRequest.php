<?php

namespace App\Http\Requests\Api\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'nullable|string',
            'description' => 'nullable|string',
            'published_at' => 'nullable|date_format:Y-m-d',
            'image_path' => 'nullable|string',
            'status' => 'nullable|integer',
//            'author' => 'nullable|string',
//            'category' => 'nullable|string',
//            'tag' => 'nullable|string',
            'profile_id' => 'required|integer',
            'category_id' => 'required|integer',
        ];
    }
}

