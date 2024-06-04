<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'service_text' => 'unique:services|required'
        ];
    }
    public function attributes(): array
    {
        return [
            'service_text' => 'Jenis Pelayanan',
        ];
    }

    public function messages()
    {
        return [
            'service_text.required' => 'Jenis Pelayanan wajib diisi',
            'service_text.unique' => 'Jenis Pelayanan sudah ada'
        ];
    }
}
