<?php

namespace App\Providers;

use App\Repository\AuthRepo;
use App\Repository\AuthRepoInterFace;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthRepoInterFace::class, AuthRepo::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
