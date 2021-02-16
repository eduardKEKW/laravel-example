<?php

namespace App\Services\Transactions;

use App\Models\User;

class RetriveTransactionsCsv implements RetriveTransactionsInterface 
{
    public function getUserTransactions(User $user): array 
    {
        // retrive from csv logic
        $transactions = [
            'code'      => 'CSV T_218_ljydmgebx',
            'amount'    => '8617.19',
            'user_id'   => '375',
        ];

        return $transactions;
    }
}