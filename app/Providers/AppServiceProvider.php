<?php

namespace App\Providers;

use App\OauthProviders\Office365Provider;
use App\OauthProviders\ZenDeskProvider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootOffice365Socialite();
        $this->bootZendeskSocialite();
    }
    private function bootOffice365Socialite()
    {


        $socialite = $this->app->make('Laravel\Socialite\Contracts\Factory');
        $socialite->extend(
            'office365',
            function ($app) use ($socialite) {
                $config = $app['config']['services.office365'];
                return $socialite->buildProvider(Office365Provider::class, $config);
            }
        );
    }
    private function bootZendeskSocialite()
    {

        $socialite = $this->app->make('Laravel\Socialite\Contracts\Factory');
        $socialite->extend(
            'zendesk',
            function ($app) use ($socialite) {
                $config = $app['config']['services.zendesk'];
                return $socialite->buildProvider(ZenDeskProvider::class, $config);
            }
        );
    }
}
