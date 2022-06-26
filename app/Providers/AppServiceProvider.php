<?php

namespace App\Providers;

use App\Repositories\GroupRepository;
use App\Repositories\Interfaces\IGroupRepositoryInterface;
use App\Repositories\Interfaces\ITeamRepositoryInterface;
use App\Repositories\TeamRepository;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(ITeamRepositoryInterface::class, TeamRepository::class);
        $this->app->bind(IGroupRepositoryInterface::class, GroupRepository::class);
    }
}
