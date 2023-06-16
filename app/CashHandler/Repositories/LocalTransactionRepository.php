<?php

namespace App\CashHandler\Repositories;

use App\Models\LocalTransaction;

class LocalTransactionRepository
{
    /**
     * @param int $amount
     * @param array $inputs
     * @return LocalTransaction
     */
    public function create(int $amount, array $inputs): LocalTransaction
    {
        return LocalTransaction::create([
            'total_amount' => $amount,
            'inputs' => $inputs
        ]);
    }

    /**
     * @return int
     */
    public function transactionsAmount(): int
    {
        return LocalTransaction::query()->sum('total_amount');
    }
}
