<?php

namespace Alibahadori\Todo\Http\Requests;

use Alibahadori\Todo\Models\Task;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTaskStatusRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'status' => [
                'required',
                'string',
                Rule::in(array_values(Task::$statusOptions)),
            ],
        ];
    }
}
