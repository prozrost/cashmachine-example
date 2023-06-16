<?php

namespace App\CashHandler\Transactions;

use App\Rules\TransferDate;
use Illuminate\Support\Facades\Validator;

class BankTransaction extends TransactionAbstract implements Transaction
{
    /**
     * @return array
     */
    public function validate(): array
    {
        $validator = Validator::make($this->request->all(), [
            'transfer_date' => ['required', 'date', new TransferDate()],
            'customer_name' => ['required', 'string'],
            'account_number' => ['required', 'alpha_num', 'digits:6'],
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
