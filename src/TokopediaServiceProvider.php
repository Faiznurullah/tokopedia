<?php

namespace Faiznurullah\Tokopedia;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;

class TokopediaServiceProvider extends ServiceProvider
{
     
    public function boot()
    {
        
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . './config/config.php', 'tokopedia');
        $this->app->singleton('tokopedia', function ($app) { 
            return new Tokopedia(Config::get('PRODUCTION_STATUS'), Config::get('CLIENT_ID_TOKOPEDIA'), Config::get('APP_TOKOPEDIA_ID'), Config::get('CLIENT_SECRET_TOKOPEDIA'), Config::get('REDIRECT_URI_TOKOPEDIA'), Config::get('REDIRECT_URI_TOKOPEDIA'));
        });
    }


}