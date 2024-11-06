<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
//        return false;
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
            'product' => 'required|string',
            'from' => 'required|string',
            'price_baht' => 'required|numeric',
            'price_dong' => 'required|numeric',
            'price_usd' => 'required|numeric',
            'profit' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'status' => 'required|boolean',
            'quantity' => 'required|integer',
        ];
    }
}
