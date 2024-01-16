<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreParentsRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'email' => 'required|string',
            'roles' => 'required|string',
            'phone' => 'required|string|max:13',
            'student_id' => 'required|unique:parents,student_id,',
            'address' => 'required|string',
            'gender' => 'required|string',
            'job_title' => 'required|string',
        ];
    }
}
