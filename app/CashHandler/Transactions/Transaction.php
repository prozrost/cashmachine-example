<?php

namespace App\CashHandler\Transactions;

interface Transaction
{
    /**
     * @return array
     */
    public function validate(): array;

    /**
     * @return int
     */
    public function amount(): int;

    /**
     * @return array
     */
    public function inputs(): array;
}
