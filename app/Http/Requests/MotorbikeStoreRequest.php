<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MotorbikeStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'customer_id' => 'required|exists:customers,id',
            'make' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|integer',
            'plate_number' => 'required|string',
            'engine_number' => 'required|string',
        ];
    }
}
