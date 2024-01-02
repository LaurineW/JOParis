<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Sport;
use App\Policies\SportPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Sport::class => SportPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('delete-sport', function ($user, $sport) {
            return $user->id === $sport->user_id;
        });
    }
}
