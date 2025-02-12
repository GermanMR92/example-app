<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class StorePartnerRequest extends FormRequest
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
            'name.required' => 'The partner name is required',
            'name.string' => 'The partner name must be a valid text',
            'name.min' => 'The partner name must have at least :min characters',
            'name.max' => 'The partner name cannot exceed :max characters',

            'email.required' => 'The email is required',
            'email.email' => 'The email must be a valid email address',
            'email.max' => 'The email cannot exceed :max characters',
            'email.unique' => 'This email is already taken',

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
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('partners', 'email')->ignore($this->route('id')), // ignore the current partner
            ],
            'categories' => 'required|array',
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
