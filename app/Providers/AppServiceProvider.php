<?php

namespace App\Providers;

use App\Interfaces\TaskRepositoryInterface;
use App\Repositories\TaskRepository;
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
        //
        $this->app->bind(TaskRepositoryInterface::class, function ($app) {
            return new TaskRepository();
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
