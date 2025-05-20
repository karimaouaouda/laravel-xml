<?php

namespace App\Providers;

use App\Models\Exercise;
use App\Models\User;
use Bmatovu\LaravelXml\Support\XmlValidator;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('answer-exo', function(User $user, Exercise $exercise){
            return now() < $exercise->getAttribute('end_at') ?
                Response::allow():
                Response::deny('the exercise submission expired at : ' . $exercise->getAttribute('end_at'));
        });

    }
}
