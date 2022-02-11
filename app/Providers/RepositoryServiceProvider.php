<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// Interfaces
use App\Repositories\BaseRepositoryInterface;
use App\Repositories\TeamRepositoryInterface;
use App\Repositories\ScholarshipRepositoryInterface;
use App\Repositories\AxieRepositoryInterface;
use App\Repositories\SlpRepositoryInterface;
use App\Repositories\RankRepositoryInterface;
use App\Repositories\ClaimSlpRepositoryInterface;
use App\Repositories\PaymentRepositoryInterface;
use App\Repositories\ProfileRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\RoninDemoDataRepositoryInterface;
// Repositories
use App\Repositories\BaseRepository;
use App\Repositories\TeamRepository;
use App\Repositories\ScholarshipRepository;
use App\Repositories\AxieRepository;
use App\Repositories\SlpRepository;
use App\Repositories\RankRepository;
use App\Repositories\ClaimSlpRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\ProfileRepository;
use App\Repositories\UserRepository;
use App\Repositories\RoninDemoDataRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(TeamRepositoryInterface::class, TeamRepository::class);
        $this->app->bind(ScholarshipRepositoryInterface::class, ScholarshipRepository::class);
        $this->app->bind(AxieRepositoryInterface::class, AxieRepository::class);
        $this->app->bind(SlpRepositoryInterface::class, SlpRepository::class);
        $this->app->bind(RankRepositoryInterface::class, RankRepository::class);
        $this->app->bind(ClaimSlpRepositoryInterface::class, ClaimSlpRepository::class);
        $this->app->bind(PaymentRepositoryInterface::class, PaymentRepository::class);
        $this->app->bind(ProfileRepositoryInterface::class, ProfileRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(RoninDemoDataRepositoryInterface::class, RoninDemoDataRepository::class);
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
