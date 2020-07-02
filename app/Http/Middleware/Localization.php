<?php

namespace App\Http\Middleware;

use Closure;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(\Session::has('locale')){
            \App::setLocale(\Session::get('locale'));
            /*You know default Language in locale is English (Config/App.php)*/
            /*so for this middleware will change language by Session*/
        }
        return $next($request);
    }
}
