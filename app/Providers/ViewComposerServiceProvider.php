<?php


namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class ViewComposerServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->composerLayoutSetting();
        $this->composerLayoutMenu();
    }

    public function composerLayoutSetting()
    {
        view()->composer('frontend.layouts.header', 'App\Http\Composers\SiteConfigurationComposer@compose');
    }

    public function composerLayoutMenu()
    {
        view()->composer('frontend.layouts.header', 'App\Http\Composers\MenuLayoutsComposer@compose');

    }

}
