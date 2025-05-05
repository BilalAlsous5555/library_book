<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;


class KeywordRule implements Rule
{
    protected int $max_word ;
    public function __construct(int $max_word)
    {
        $this->max_word = $max_word; 
    }
    public function passes($attribute, $value)
    {
        $words = explode(',' , $value);
        return count($words) == $this->max_word; 
    }

    public function message()
    {
        return 'the keyword word`s should be equal: '. $this->max_word .' words !';
    }
}
