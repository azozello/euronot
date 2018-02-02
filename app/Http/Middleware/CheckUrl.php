<?php

namespace App\Http\Middleware;

use Closure;
use App\Redirects;

class CheckUrl
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
        $url = Redirects::where('old_url','=',$request->url())->get();
        if(count($url) != 0){
            return redirect($url[0]->new_url);
        }

        return $next($request);
    }
}
