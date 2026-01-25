<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|string|min:3|max:100',
            'description' => 'nullable|string|max:1000',
            'content' => 'nullable|string|max:10000',
            'preview_image' => 'nullable|file|image|max:2048',
            'price' => 'required|decimal:0,2|min:0',
            'stock' => 'required|integer|min:0',
            'is_published' => 'nullable|boolean',
            'category_id' => 'required|integer|exists:categories,id',
            'tags' => 'nullable|array', 
            'tags.*' => 'integer|exists:tags,id',
        ];
    }
}
