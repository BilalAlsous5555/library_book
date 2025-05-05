<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SlugRule implements Rule
{
    public function passes($attribute, $value)
    {
        return  preg_match('/^[a-z0-9-]+$/', $value);
    }

    public function message()
    {
        return 'Sulg should be a combination of numbers , lowerCase letters and (-) character';
    }
}
