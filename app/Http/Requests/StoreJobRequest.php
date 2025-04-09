<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobRequest extends FormRequest
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
            'job_title' => 'required|string|max:255',
            'slug' => 'required',
            'job_description' => 'required|string',
            'requirements' => 'required|string',
            'job_benefit' => 'required|string',
            'salary' => 'nullable|string|max:50',
            'location' => 'required|string|max:255',
            'province_id' => 'required|exists:provinces,id',
            'category_id' => 'required|exists:job_categories,category_id',
            'position_id' => 'required|exists:company_position,id',
            'employer_id' => 'required|exists:employers,employer_id',
            'posted_date' => 'required|date_format:d-m-Y',
            'expiry_date' => 'required|after:posted_date|date_format:d-m-Y',
            'required_education' => 'nullable|string|max:50',
            'required_exp' => 'nullable|string|max:100',
            'job_type' => 'required|string|max:30',
            'is_hot' => 'nullable|in:yes,no',
            'approval_status' => 'nullable|in:approved,rejected,pending',
            'skills' => 'nullable|array',
            'skills.*' => 'exists:skills,skill_id',
        ];
    }
}
