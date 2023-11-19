<?php

namespace App\Providers;

use App\Helpers\ModelHelper;
use App\Observers\FileUrlObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $modelClasses = ModelHelper::getAllModelClasses();
        foreach ($modelClasses as $model) {
            $model::observe(FileUrlObserver::class);
        }
    }
}
