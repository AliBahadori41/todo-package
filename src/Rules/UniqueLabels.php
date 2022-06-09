<?php

namespace Alibahadori\Todo\Rules;

use Alibahadori\Todo\Models\Label;
use Illuminate\Contracts\Validation\Rule;

class UniqueLabels implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $value = strtolower(str_replace(' ', '_', $value));

        return ! Label::where('slug', $value)->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Label with provided title already exists.';
    }
}
