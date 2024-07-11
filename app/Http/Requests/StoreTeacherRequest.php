<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherRequest extends FormRequest
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
            'name_ar'=>'required|unique:teachers,full_name_ar',
            'name_en'=>'required|unique:teachers,full_name_en',
            'address'=>'required',
            'phone'=>'numeric|required',
            'gender'=>'required',
            'birth_p'=>'required',
            'birth_d'=>'required',
            'qualification'=>'required',
            'salary'=>'required|numeric',
        ];
    }
}
