<?php

namespace App\Providers;

use App\Repositoreis\AuthRepo;
use App\Repositoreis\AuthRepoInterface;
use App\Repositoreis\BookingRepo;
use App\Repositoreis\BookingRepoInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthRepoInterface::class, AuthRepo::class);
        $this->app->bind(BookingRepoInterface::class, BookingRepo::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
