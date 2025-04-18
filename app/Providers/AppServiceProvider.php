<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Pulse\Facades\Pulse;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->register(\L5Swagger\L5SwaggerServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //Глобальные ограничения
        //Route::pattern('id', '[0-9]+');

        //JsonResource::withoutWrapping();
        Gate::define('viewPulse', function (User $user) {
            return true; //$user->isAdmin();
        });

        // Pulse::handleExceptionsUsing(fn ($e) => report($e));
    
        // Pulse::authorize(function ($request) {
        //     //return $request->user()?->isAdmin();
        //     return true;
        // });
    }
}
