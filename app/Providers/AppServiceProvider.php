<?php

namespace App\Providers;

use App\Models\DetailUser;
use App\Observers\DetailUserObserver;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(\App\Interfaces\OfficerInterface::class, \App\Repositories\OfficerRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        DetailUser::observe(DetailUserObserver::class);
    }
}
