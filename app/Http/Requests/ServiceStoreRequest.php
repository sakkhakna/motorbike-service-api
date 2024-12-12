<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceStoreRequest extends FormRequest
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
            'motorbike_id' => 'required|exists:motorbikes,id',
            'service_date' => ['required', 'date'],
            'service_type' => ['required', 'string'],
            'service_status' => ['required', 'string'],
            'service_cost' => ['required', 'numeric'],
        ];
    }
}
