<?php

namespace App\Providers;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Collection::macro('pick', function ($columns) {
            return collect($this->items)->map(function ($value) use ($columns) {
                return collect($columns)
                    ->map(function ($column) use ($value) {
                        return $value->$column;
                    })->all();
            });
        });
    }
}
