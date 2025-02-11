<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Http;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The product name is required.',
            'name.string' => 'The product name must be a valid text.',
            'name.min' => 'The product name must have at least :min characters.',
            'name.max' => 'The product name cannot exceed :max characters.',

            'description.string' => 'The description must be valid text.',
            'description.max' => 'The description cannot exceed :max characters.',

            'price.required' => 'The price is required.',
            'price.numeric' => 'The price must be a number.',
            'price.min' => 'The price cannot be negative.',

            'stock.required' => 'The stock is required.',
            'stock.integer' => 'The stock must be an integer.',
            'stock.min' => 'The stock cannot be negative.',

            'cta_url.url' => 'The call-to-action URL must be valid.',
            'cta_url.max' => 'The call-to-action URL cannot exceed :max characters.',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:5|max:50',
            'description' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'cta_url' => 'nullable|url|max:255',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
        ], 400));
    }
}
