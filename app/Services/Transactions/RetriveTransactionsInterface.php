<?php

namespace App\Services\Transactions;

use App\Models\User;

interface RetriveTransactionsInterface 
{
    public function getUserTransactions(User $user): array;
}