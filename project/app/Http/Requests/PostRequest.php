<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'content' => 'required|string',
            'likes' => 'required|integer',
            'category_id' => 'required|integer',
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:tags,id'],
            'image_file' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp',
        ];
    }
    public function messages()
    {
        return [
            'image_file.mimes' => 'Изображение должно быть в одном из следующих форматов: jpeg, png, jpg, gif, svg, webp.',
        ];
    }
}
