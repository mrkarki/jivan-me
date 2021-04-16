<?php


namespace App\Http\Composers;


use App\Models\Setting;

class SiteConfigurationComposer
{
    public function compose($view)
    {
        $view->with('_configs', $this->getSiteConfigurationsAsArray());
    }

    public function getSiteConfigurationsAsArray()
    {
        $configs = Setting::pluck('meta_value', 'meta_key');

//        foreach ($configs as $key => $config) {
//            switch ($key) {
//
//                case 'social_links':
//                    $configs->social_links = json_decode($config, 1);
//                    break;
//
//            }
//        }
        return $configs;
    }
}
