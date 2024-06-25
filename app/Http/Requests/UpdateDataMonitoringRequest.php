<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDataMonitoringRequest extends FormRequest
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
            'dataMonitoring_id' => 'required|exists:data_monitoring,id',
            'design_pic' => 'nullable|string',
            'design_start' => 'nullable|date',
            'design_end' => 'nullable|date',
            'nesting_pic' => 'nullable|string',
            'nesting_start' => 'nullable|date',
            'nesting_end' => 'nullable|date',
            'program_pic' => 'nullable|string',
            'program_start' => 'nullable|date',
            'program_end' => 'nullable|date',
            'checker_pic' => 'nullable|string',
            'checker_start' => 'nullable|date',
            'checker_end' => 'nullable|date',
        ];
    }
}
