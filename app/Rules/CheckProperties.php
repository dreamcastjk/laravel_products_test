<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckProperties implements Rule
{
    protected $allowed_attributes;

    protected $failed_attributes;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->allowed_attributes = ['title'];
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($diff = array_diff(array_keys($value), $this->allowed_attributes)) {
            $this->failed_attributes = implode(', ', $diff);
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.property.column_not_exist', ['attributes' => $this->failed_attributes]);
    }
}
