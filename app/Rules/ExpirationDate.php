<?php

namespace App\Rules;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ExpirationDate implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $expiredDate = explode('/', $value);
        $expiredDate = Carbon::createFromDate($expiredDate[1], $expiredDate[0], now()->day);

        if (now()->diffInMonths($expiredDate) <= 2) {
            $fail('Expiration date should be 2 months bigger than now');
        }
    }
}
