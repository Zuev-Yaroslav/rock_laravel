<?php

namespace App\Http\Requests\Api\Video;

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
            'video_path' => 'required|string',
            'thumbnail_path' => 'required|string',
            'description' => 'nullable|string',
            'profile_id' => 'required|integer|exists:users,id',
        ];
    }
}
