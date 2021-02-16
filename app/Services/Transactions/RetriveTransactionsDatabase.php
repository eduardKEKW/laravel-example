<?php

namespace App\Services\Transactions;

use App\Models\User;

class RetriveTransactionsDatabase implements RetriveTransactionsInterface 
{
    public function getUserTransactions(User $user): array 
    {
        $transactions = Transaction::where('user_id', $user->id)->get();

        return $transactions;
    }
}