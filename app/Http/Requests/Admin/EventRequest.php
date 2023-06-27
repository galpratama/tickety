<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        // Use validation for edit and create
        $rules = [
            'name' => 'required|string|max:255|unique:events,name,',
            'headline' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'location' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
        ];

        // If edit, remove required
        if ($this->isMethod('put')) {
            $rules['name'] = 'string|max:255|unique:events,name,' . $this->route('event');
        }

        return $rules;
    }
}
