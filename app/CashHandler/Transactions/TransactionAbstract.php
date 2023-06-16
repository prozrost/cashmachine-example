<?php

namespace App\CashHandler\Transactions;

use Illuminate\Http\Request;

class TransactionAbstract
{
    protected Request $request;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return array
     */
    public function inputs(): array
    {
        return $this->request->except('_token');
    }
}
