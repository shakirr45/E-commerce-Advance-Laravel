<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


// pura website e taka or dollar convert er khetre========================>
use DB;

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
    public function boot(): void
    {
        //
        // pura website e taka or dollar convert er khetre========================>
        $settings = DB::table('settings')->first();
        // Sob jaygay jate coray dwa jay === setting dici nam var hishabe =====>
        view()->share('setting',$settings);
    }
}
