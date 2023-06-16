<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CashTransactionAmount implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $amount = 0;

        foreach ($value as $key => $number) {
            $amount+= $key * $number;
        }

        if ($amount >= 10000) {
            $fail('Max amount should be less then 10000');
        }
    }
}
