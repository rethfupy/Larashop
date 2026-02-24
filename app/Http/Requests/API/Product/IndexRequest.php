<?php

namespace App\Http\Requests\API\Product;

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
            'category' => 'nullable|integer|exists:categories,id',
            'price' => 'nullable|array',
            'price.from' => 'nullable|numeric|min:0',
            'price.to' => 'nullable|numeric|min:0',
            'tags' => 'nullable|array',
            'tags.*' => 'nullable|integer|exists:tags,id',
            'page' => 'required|integer',
            'products_per_page' => 'required|integer',
            'sort' => 'nullable|string|in:price_asc,price_desc,newest,oldest,name_asc,name_desc',
            'exclude_id' => 'nullable|integer|exists:products,id',
        ];
    }
}