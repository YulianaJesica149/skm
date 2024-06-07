<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
            'service_id' => 'required',
            'question_text' => 'required'
        ];
    }
    public function attributes(): array
    {
        return [
            'service_id' => 'Jenis Pelayanan',
            'question_text' => 'Pertanyaan',
        ];
    }
    public function messages()
    {
        return [
            'service_id.required' => 'Jenis Pelayanan wajib diisi',
            'question_text' => 'Pertanyaan wajib diisi'
        ];
    }
}
