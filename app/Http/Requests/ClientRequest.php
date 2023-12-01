<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'type_of_client' =>         ['required'],
            'company_name' =>           ['required', 'min:2'],
            'company_email' =>          ['required', 'email'],
            'date_of_birth' =>          ['nullable'],
            'registration_number' =>    ['nullable'],
            'contact_name' =>           ['required', 'min:2'],
            'contact_email' =>          ['required', 'email']
        ];
    }
    public function messages(): array{
        return [
            'type_of_client.required' => 'Please select type of Client.',
            'company_name.required' => 'Please enter a name.',
            'company_name.min' => 'Please enter a valid name.',
            'company_email.required' => 'Please enter an email.',
            'company_email.email' => 'Please enter a valid email',
            'contact_name.required' => 'Please enter Contact name.',
            'contact_name.min' => 'Please enter valid Contact name.',
            'contact_email.required' => 'Please enter Contact email.',
            'contact_email.email' => 'Please enter valid Contact email.'
        ];
    }
}
