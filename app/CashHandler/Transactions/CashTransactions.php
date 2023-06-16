<?php

namespace App\CashHandler\Transactions;

use App\Rules\CashTransactionAmount;
use Illuminate\Support\Facades\Validator;

class CashTransactions extends TransactionAbstract implements Transaction
{

    /**
     * @return array
     */
    public function validate(): array
    {
        $validator = Validator::make($this->request->all(), [
           'denomination' => ['required', 'array', new CashTransactionAmount()]
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
        $amount = 0;

        foreach ($this->request->get('denomination') as $key => $number) {
            $amount+= $key * $number;
        }

        return $amount;
    }
}
