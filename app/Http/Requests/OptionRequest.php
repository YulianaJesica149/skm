<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OptionRequest extends FormRequest
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
            'question_id' => 'required',
            'option_text' => 'required',
            'points' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'question_id' => 'pertanyaan',
            'option_text' => 'pilihan',
            'points' => 'poin',
        ];
    }
    public function messages()
    {
        return [
            'question_id' => 'Pertanyaan wajib diisi',
            'option_text.required' => 'Pilihan wajib diisi',
            'points.required' => 'Poin wajib diisi'
        ];
    }
}
