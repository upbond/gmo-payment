<?php

namespace Gineign\GmoPayment;

// use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;

class ServiceProvider extends RouteServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
      $config = realpath(__DIR__.'/Services/config.php');

      $this->mergeConfigFrom($config, 'gmopayment');

      $this->publishes([
          $config => config_path('gmopayment.php'),
      ], 'config');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
