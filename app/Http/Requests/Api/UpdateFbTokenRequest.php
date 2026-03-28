<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFbTokenRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'fb_token' => ['required', 'string', 'max:4096'],
        ];
    }

    public function messages(): array
    {
        return [
            'fb_token.required' => 'رمز Firebase مطلوب',
            'fb_token.max' => 'رمز Firebase يتجاوز الطول المسموح',
        ];
    }

    public function attributes(): array
    {
        return [
            'fb_token' => 'رمز Firebase',
        ];
    }
}
