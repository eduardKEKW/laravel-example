<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\Transactions\RetriveTransactionsInterface;

class TransactionsController extends Controller
{
    protected $retriveTransactions;

    public function __construct(RetriveTransactionsInterface $retriveTransactions)
    {
        $this->retriveTransactions = $retriveTransactions;
    }

    public function index()
    {
        $transactions = $this->retriveTransactions->getUserTransactions(Auth::user());

        return response()->json([
            'transactions' => $transactions
        ]);

    }
}
