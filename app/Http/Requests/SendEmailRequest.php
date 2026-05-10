<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendEmailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && (auth()->user()->role === 'ADMIN' || auth()->user()->role === 'SUPERADMIN');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'subject' => 'required|string|max:255',
            'body' => 'required|string|max:65535',
            'cc_email' => 'nullable|email|max:255',
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'subject.required' => 'El asunto es obligatorio.',
            'subject.max' => 'El asunto no puede exceder 255 caracteres.',
            'body.required' => 'El cuerpo del email es obligatorio.',
            'body.max' => 'El cuerpo del email es demasiado largo.',
            'cc_email.email' => 'El email de copia debe ser una dirección válida.',
        ];
    }
}
