<?php
/**
 * Created by PhpStorm.
 * User: DHC
 * Date: 2015/11/4
 * Time: 11:19
 */

namespace HongcaiDeng\SSO_Client;

use Illuminate\Support\ServiceProvider;

class SSOClientServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__.'/../config/sso-client.php';
        $this->publishes([
            $configPath                         => config_path('sso-client.php'),
        ]);
    }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;
        $app['sso-client'] = $app->share(function ($app) {
            return new SSOClient(config('sso-client', []));
        });
    }
}