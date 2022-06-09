<?php

namespace Alibahadori\Todo\Http\Requests;

use Alibahadori\Todo\Rules\UniqueLabels;
use Illuminate\Foundation\Http\FormRequest;

class CreateLabelRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => [
                'required',
                'string',
                'max:255',
                new UniqueLabels
            ],
        ];
    }
}
