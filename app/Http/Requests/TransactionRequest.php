<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'pay' => 'required|array',
            'pay.*' => 'integer',
            'data' => 'required|array',
            'data.*.productId' => 'required|integer',
            'data.*.qty' => 'required|integer|min:1',
        ];
    }
    // public function messages()
    // {
    //     return [
    //         'paid.required' => 'The paid field is required.',
    //         'paid.integer' => 'The paid field in the data must be a integer value.',
    //         'data.required' => 'The data field is required.',
    //         'data.*.productId.required' => 'The productId field in the data is required.',
    //         'data.*.productId.integer' => 'The productId field in the data must be a integer value.',
    //         'data.*.qty.required' => 'The qty field in the data is required.',
    //         'data.*.qty.integer' => 'The qty field in the data must be a integer value.',
    //         'data.*.qty.min' => 'The qty field in the data must be at least 1.',
    //     ];
    // }
}
