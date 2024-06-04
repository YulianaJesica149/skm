<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RespondentRequest extends FormRequest
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
            'umur' => 'required',
            'jenis_kelamin' => 'required|not_in:0',
            'pendidikan' => 'required|not_in:0',
            'pekerjaan' => 'required|not_in:0',
        ];
    }
    public function messages()
    {
        return [
            'umur.required' => 'Umur wajib diisi',
            'jenis_kelamin.required' => 'jenis kelamin wajib diisi',
            'pendidikan.required' => 'pendidikan wajib diisi',
            'pekerjaan.required' => 'pekerjaan wajib diisi',

        ];
    }
}
