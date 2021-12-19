<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exceptions;
use \Tymon\JWTAuth\Exceptions\BaseMiddleware;
class JWTMiddleware
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
try{
  $user=JWTAuth::parseToken()->authenticate();

}catch(Exception $e){
    if($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
        return response()->json(['status'=>'Token is in valid']);
    }else if($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
        return response()->json(['stauts'=>'Token is expired']);
    }else{
        return response()->json(['status'=>'Token is not found']);
    }

}
        return $next($request);
    }
}
