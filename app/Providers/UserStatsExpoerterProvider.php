<?php

namespace App\Providers;

use App\Exporter\Translator;
use App\Exporter\UserStatsCsvExpoerter;
use App\Exporter\UserStatsExporterContract;
use App\Exporter\UserStatsXmlExpoerter;
use Illuminate\Support\ServiceProvider;

class UserStatsExpoerterProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UserStatsExporterContract::class, function(){
            return new UserStatsXmlExpoerter(new Translator( config('app.locale')));
        });
    }
}
