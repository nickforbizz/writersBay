<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use App\User;

class WebMiddleware
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

        if(Auth::guard('api')->check()){
            $request->user=$request->user('api');

            $response=$next($request);
   
        }else{
            $response=response()->json(['tag' => '-5','message'=>'Unauthenticated Request']);
        }

        return $response;
    }
}
