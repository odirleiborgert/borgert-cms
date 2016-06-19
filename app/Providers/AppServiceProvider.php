<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use mjanssen\BreadcrumbsBundle\Breadcrumbs;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \View::composer('components.breadcrumbs', function(){
            $data = [
                'global_breadcrumbs' => Breadcrumbs::automatic()
            ];
            view()->share($data);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
