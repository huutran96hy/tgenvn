<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployerRequest extends FormRequest
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
            // 'user_id' => 'required|exists:users,id',
            'company_name' => 'required|max:255',
            'slug' => 'required',
            'logo' => 'nullable',
            'background_img' => 'nullable',
            'images' => 'nullable',
            'company_description' => 'nullable',
            'employer_benefit' => 'nullable',
            'website' => 'nullable|url|max:200',
            'contact_phone' => 'required|regex:/^[0-9]{10,11}$/',
            'address' => 'required|max:255',
            'show_company_address' => 'nullable|boolean',
            'email' => 'nullable|email|max:50',
            'founded_at' => 'nullable',
            'about' => 'nullable|max:200',
            'company_type' => 'nullable|max:600',
            'map_url' => 'nullable|string',
            'is_hot' => 'nullable|in:yes,no',
        ];
    }

    public function messages(): array
    {
        return [
            'contact_phone.regex' => 'Số điện thoại không hợp lệ. Vui lòng nhập từ 10 đến 11 chữ số.',
        ];
    }
}
