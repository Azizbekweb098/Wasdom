<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminAuthStoreRequest extends FormRequest
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
          'phone' => ['required', 'integer'],
            'password' => ['required', 'string'],
        ];
    }
    public function message()
    {
        return [
            'phone.required' => 'Phone maydoni to‘ldirilishi shart.',
            'phone.integer' => 'Phone to‘g‘ri formatda bo‘lishi kerak.',
            'email.email' => 'Kiritilgan email yaroqli bo‘lishi kerak.',
            'password.required' => 'Parol maydoni to‘ldirilishi shart.',
            'password.string' => 'Parol to‘g‘ri formatda bo‘lishi kerak.',
        ];
    }
}
