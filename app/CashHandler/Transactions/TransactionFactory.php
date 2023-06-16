<?php

namespace App\CashHandler\Transactions;

use App\CashHandler\Exceptions\UnrecognizedTransactionException;
use Illuminate\Http\Request;

class TransactionFactory
{
    /**
     * @param Request $request
     * @return Transaction
     * @throws UnrecognizedTransactionException
     */
    public static function make(Request $request): Transaction
    {
        if ($request->has('denomination')) {
            return new CashTransactions($request);
        } elseif ($request->has('card_number')) {
            return new CardTransaction($request);
        } elseif ($request->has('transfer_date')) {
            return new BankTransaction($request);
        }

        throw new UnrecognizedTransactionException();
    }
}
