<?php
namespace Scarletspruce\Turbosms\Providers;

use Illuminate\Support\ServiceProvider;
use Scarletspruce\Turbosms\TurboSms;

/**
 * Class ServiceProvider
 * @package Scarletspruce\Turbosms
 */
class TurbosmsServiceProvider extends ServiceProvider
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
        if (!config('turbo_sms')) {
            $this->publishes(
                [
                    __DIR__ . '/../config/config.php' => config_path('turbo_sms.php'),
                ]
            );
        }

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton('sms', function ($app) {
            $login = config('turbo_sms.auth.login');
            $password = config('turbo_sms.auth.password');
            $sender = config('turbo_sms.sender');
            $url = config('turbo_sms.url');

            return new TurboSms($login, $password, $sender, $url);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {

        return ['sms'];
    }

}
