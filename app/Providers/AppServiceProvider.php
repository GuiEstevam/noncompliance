<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Yasumi\Provider\Brazil;
use Yasumi\Yasumi;

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
        Schema::defaultStringLength(191);
        Config::set('app.locale', 'pt_BR');
        date_default_timezone_set(Config::get('app.timezone'));
        Carbon::setLocale('pt_BR');
    }
}
