<?php

namespace App\Providers;

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Gate;

use App\Models\User;
use App\Policies\UserPolicy;
// use Illuminate\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {

        $this->registerPolicies();
        Gate::define('authorizeDashboard', [UserController::class, 'authorizeDashboard']); //defining gate for letting user authorize dashboard
        //
    }
}
