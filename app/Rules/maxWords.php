<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class maxWords implements Rule
{
    public $max_words;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($max_words=100)
    {
        $this->max_words = $max_words;
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
        
        if(count(explode(' ', $value)) > $this->max_words){
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
        return ':attribute should not be more than '.$this->max_words.' words';
    }
}
