<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreGroupRequest extends FormRequest
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
            'name.required' => 'The category group name is required',
            'name.string' => 'The category group name must be a valid text',
            'name.min' => 'The category group name must have at least :min characters',
            'name.max' => 'The category group name cannot exceed :max characters',

            'categories.required' => 'The categories are required.',
            'categories.array' => 'The categories must be an array.',
            'categories.*.exists' => 'One or more categories are invalid.'
            
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
            'name' => 'required|string|min:3|max:50',
            'categories' => 'array',
            'categories.*' => 'exists:categories,id'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
        ], 400));
    }
}
