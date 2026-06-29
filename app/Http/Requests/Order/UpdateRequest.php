<?php

namespace App\Http\Requests\Order;

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
            'shipping_first_name' => 'required|string|max:50',
            'shipping_last_name' => 'required|string|max:50',
            'shipping_email' => 'required|email',
            'shipping_phone' => 'required|string|max:20',
            'shipping_country' => 'required|string|max:50',
            'shipping_state' => 'required|string|max:100',
            'shipping_address_line' => 'required|string|max:255',
            'shipping_address_line_2' => 'nullable|string|max:255',
            'shipping_city' => 'required|string|max:100',
            'shipping_postal_code' => 'required|string|max:20',
        ];
    }
}
