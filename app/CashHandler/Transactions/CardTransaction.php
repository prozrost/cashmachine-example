<?php

namespace App\CashHandler\Transactions;

use App\Rules\ExpirationDate;
use Illuminate\Support\Facades\Validator;

class CardTransaction extends TransactionAbstract implements Transaction
{
    /**
     * @return array
     */
    public function validate(): array
    {
        $validator = Validator::make($this->request->all(), [
            'card_number' => ['required', 'numeric', 'digits:16', 'starts_with:4'],
            'cvv' => ['required', 'numeric', 'digits:3'],
            'expiration_date' => ['required', 'date_format:m/Y', new ExpirationDate()],
            'cardholder' => ['required', 'string'],
            'amount' => ['required', 'numeric']
        ]);

        if ($validator->fails()) {
            return $validator->errors()->toArray();
        }

        return [];
    }

    /**
     * @return int
     */
    public function amount(): int
    {
        return $this->request->get('amount');
    }
}
