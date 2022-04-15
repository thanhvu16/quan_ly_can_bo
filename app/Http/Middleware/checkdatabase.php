<?php

namespace App\Http\Middleware;

use Closure;
use Cookie;
use Config;
use DB;
use App\User;
use Auth;
use Illuminate\Support\Facades\Artisan;
use Session;

class checkdatabase
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

        return $next($request);
    }
}
