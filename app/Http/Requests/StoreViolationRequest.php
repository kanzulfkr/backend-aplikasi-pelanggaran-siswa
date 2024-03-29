<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreViolationRequest extends FormRequest
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
            'violations_types_id' => 'required|exists:violations_types,id',
            'student_id' => 'required|exists:students,id',
            'officer_id' => 'required|exists:teachers,id',
            'catatan' => 'string|nullable',
            'is_validate' => 'required|bool',
            'is_confirm' => 'required|bool',
        ];
    }
}
