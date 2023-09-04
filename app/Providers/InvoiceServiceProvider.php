<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\InvoiceService;
use App\Repositories\InvoiceRepository;
use App\Repositories\InvoiceRepositoryInterface;

class InvoiceServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(InvoiceRepositoryInterface::class, InvoiceRepository::class);

        $this->app->bind(InvoiceService::class, function ($app) {
            return new InvoiceService($app->make(InvoiceRepositoryInterface::class));
        });
    }
}