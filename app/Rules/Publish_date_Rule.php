<?php

namespace App\Rules;

use Illuminate\Support\Carbon;
use Illuminate\Contracts\Validation\Rule;

class Publish_date_Rule implements Rule
{
    public function passes($attribute, $value)
    {
        return now()->lt(Carbon::parse($value)); // to determain future time
    }

    public function message()
    {
        return 'you should make date bigger than '. now();
    }
}
