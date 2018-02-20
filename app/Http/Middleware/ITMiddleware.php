<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class ITMiddleware
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
      if (Auth::user()->mutationActive()->department->id == 1) {
         return $next($request);
      }else{
         return back()->with('warning', 'Sorry, you can not access this page.');
      }
   }
}
