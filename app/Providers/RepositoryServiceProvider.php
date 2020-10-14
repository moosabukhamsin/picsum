<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\EloquentRepositoryInterface; 
use App\Repository\BaseRepository; 
use App\Repositories\Image\ImageRepositoryInterface;
use App\Repositories\Image\ImageRepository;  


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(ImageRepositoryInterface::class, ImageRepository::class);
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
