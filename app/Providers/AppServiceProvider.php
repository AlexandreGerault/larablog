<?php

namespace App\Providers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Blade::stringable(static fn (Carbon $date) => $date
            ->locale(app()->getLocale())
            ->translatedFormat('j F Y'));
    }
}
