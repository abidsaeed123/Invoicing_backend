<?php
namespace App\Providers;
// app/Providers/ItemServiceProvider.php

use Illuminate\Support\ServiceProvider;
use App\Services\ItemService;
use App\Repositories\ItemRepository;
use App\Repositories\ItemRepositoryInterface;

class ItemServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ItemRepositoryInterface::class, ItemRepository::class);

        $this->app->bind(ItemService::class, function ($app) {
            return new ItemService($app->make(ItemRepositoryInterface::class));
        });
    }
}
