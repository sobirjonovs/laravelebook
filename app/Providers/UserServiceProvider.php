<?php

namespace App\Providers;

use App\Services\Teacher;
use App\Services\Test;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(Teacher::class, function (Application $application) {
            return new Teacher(
                name: 'Sanjarbek Sobirjonov',
                phone: '+998906840616'
            );
        });

        $this->app->bind('user', function (Application $application) {
            return $application->make(Test::class);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
