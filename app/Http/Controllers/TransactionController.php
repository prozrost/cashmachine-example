<?php

namespace App\Http\Controllers;

use App\CashHandler\CashMachine;
use App\CashHandler\Exceptions\ProcessingLimitException;
use App\CashHandler\Transactions\TransactionFactory;
use App\Models\LocalTransaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * @param Request $request
     * @param CashMachine $cashMachine
     * @return \Illuminate\Http\RedirectResponse
     * @throws \App\CashHandler\Exceptions\UnrecognizedTransactionException
     */
    public function handleTransaction(Request $request, CashMachine $cashMachine)
    {
        $transaction = TransactionFactory::make($request);

        $validation = $transaction->validate();

        if (!empty($validation)) {
            return redirect()->back()->withErrors($validation);
        }

        try {
            $transactionLocal = $cashMachine->store($transaction);
        } catch (ProcessingLimitException $exception) {
            return redirect()->back()->withErrors(['general' => 'Cash machine limit exceeded']);
        }

        return redirect()->route('show-transaction', ['transaction' => $transactionLocal->id]);
    }

    /**
     * @param LocalTransaction $transaction
     * @return \Illuminate\Contracts\View\View
     */
    public function showTransaction(LocalTransaction $transaction)
    {
        return view('show', ['transaction' => $transaction]);
    }
}
