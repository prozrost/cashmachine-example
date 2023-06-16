<?php
namespace App\CashHandler;

use App\CashHandler\Exceptions\ProcessingLimitException;
use App\CashHandler\Repositories\LocalTransactionRepository;
use App\CashHandler\Transactions\Transaction;
use App\Models\LocalTransaction;

class CashMachine
{
    private const MAX_AMOUNT = 20000;

    private LocalTransactionRepository $repository;

    /**
     * @param LocalTransactionRepository $repository
     */
    public function __construct(LocalTransactionRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Transaction $transaction
     * @return LocalTransaction
     * @throws ProcessingLimitException
     */
    public function store(Transaction $transaction): LocalTransaction
    {
        if (($this->repository->transactionsAmount() + $transaction->amount()) >= self::MAX_AMOUNT) {
            throw new ProcessingLimitException();
        }

        return $this->repository->create($transaction->amount(), $transaction->inputs());
    }
}
