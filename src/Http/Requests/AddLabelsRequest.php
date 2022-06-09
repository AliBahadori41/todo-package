<?php

namespace Alibahadori\Todo\Http\Requests;

use Alibahadori\Todo\Rules\CheckDuplicatedLabels;
use Illuminate\Foundation\Http\FormRequest;

class AddLabelsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'labels' => 'required|array|min:1',
            'labels.*' => [
                "required",
                "distinct",
                "exists:labels,id",
                new CheckDuplicatedLabels($this->route('task'))
            ]
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
