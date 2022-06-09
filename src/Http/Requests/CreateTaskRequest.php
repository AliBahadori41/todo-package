<?php

namespace Alibahadori\Todo\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:65535',
            'labels' => 'required|array',
            'labels.*' => "required|distinct|exists:labels,id"
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'labels.*' => 'label(s)'
        ];
    }
}
