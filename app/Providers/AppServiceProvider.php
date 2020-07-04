<?php

namespace App\Providers;
use DB;
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
        $job_classifications = DB::table('job_classifications')
        ->get();

        $job_types = DB::table('job_types')
        ->get();

        $salary_ranges = DB::table('salary_ranges')
        ->get();

        $business_industries = DB::table('business_industries')
        ->get();
        $experience_levels = DB::table('experience_levels')
        ->get();

        view()->share('job_classifications', $job_classifications);
        view()->share('job_types', $job_types);
        view()->share('salary_ranges', $salary_ranges);
        view()->share('business_industries', $business_industries);
        view()->share('experience_levels', $experience_levels);
  
    }
}
