<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Transactions\RetriveTransactionsCsv;
use App\Services\Transactions\RetriveTransactionsDatabase;
use App\Services\Transactions\RetriveTransactionsInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(RetriveTransactionsInterface::class, function ($app) {

            $requestedSource = request()->input('source');
            
            $allowedSources = [
                'db'    => 'App\Services\Transactions\RetriveTransactionsDatabase',
                'csv'   => 'App\Services\Transactions\RetriveTransactionsCsv',
            ];

            return in_array($requestedSource, array_keys($allowedSources))
                ? new $allowedSources[$requestedSource]
                : abort(400, "The requested source is not supportd.");
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
