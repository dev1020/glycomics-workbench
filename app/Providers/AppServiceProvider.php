<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

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
    public function boot(Request $request): void
    {
        Paginator::useBootstrapFive();
//        $path_array = $request->segments();
//        $admin_route = [config('app.app_admin_route')];
//
//        if(in_array($path_array,$admin_route)){
//            config(['app.app_scope'=>'admin']);
//        }
//        $app_scope = config('app.app_scope');
//        //if App scope is admin then define View/Theme folder path
//        if ($app_scope == 'admin') {
//            $path = resource_path('admin/views');
//        } else {
//            $path = resource_path('front/views');
//        }
//        //view()->addLocation($path);
    }
}
