<?php

namespace App\Http\Requests\API\Order;

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
            'user_id' => 'nullable|integer|exists:users,id',
            'total_price' => 'required|numeric|min:0',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => array_filter([
                'required',
                'email',
                $this->boolean('create_new_account') && !$this->filled('user_id') ? 'unique:users,email' : null,
            ]),
            'phone' => 'required|string|max:20',
            'country' => 'required|string|max:50',
            'state' => 'required|string|max:100',
            'address_line' => 'required|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'postcode' => 'required|string|max:20',
            'create_new_account' => 'required|boolean',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|integer|exists:products,id',
            'items.*.qty' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric|min:0',
        ];
    }
}