<?php

namespace App\Providers;

use App\Http\Controllers\Api\TaxCalculatorController;
use App\Repository\Tax\TaxMysqlRepository;
use App\Repository\Tax\TaxPostgresqlRepository;
use App\Repository\Tax\TaxRepositoryFactory;
use App\Repository\Tax\TaxRepositoryInterface;
use App\UseCase\Tax\TaxUseCase;
use App\UseCase\Tax\TaxUseCaseInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $taxRepository=new TaxRepositoryFactory();
        $this->app->bind(TaxRepositoryInterface::class, $taxRepository(config('database.initial')));

        $this->app
            ->when(TaxCalculatorController::class)
            ->needs(TaxUseCaseInterface::class)
            ->give(function ($app) {
                return $app->make(TaxUseCase::class, [$app->make(TaxRepositoryInterface::class)]);
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
