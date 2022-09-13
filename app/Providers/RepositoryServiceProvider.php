<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\ImageRepoInterface;
use App\Repo\ImageRepo;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ImageRepoInterface::class, ImageRepo::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
