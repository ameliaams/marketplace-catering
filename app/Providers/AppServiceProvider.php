<?php

namespace App\Providers;

use App\Interfaces\MenuInterface;
use App\Repositories\MenuRepository;
use App\Interfaces\ProfileInterface;
use App\Repositories\ProfileRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(MenuInterface::class, MenuRepository::class);
        $this->app->bind(ProfileInterface::class, ProfileRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
