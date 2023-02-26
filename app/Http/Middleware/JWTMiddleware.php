<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenExpiredException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenInvalidException;
// use PHPOpenSourceSaver\JWTAuth\JWTAuth;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class JWTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $message = '';

        // Token Validations
        try{
            JWTAuth::parseToken()->authenticate();
            return $next($request);
        }
        catch(TokenExpiredException $e){
            // do what when the token expires
            $message = 'token expired';
        }
        catch(TokenInvalidException $e){
            // do what when the token invalid
            $message = 'token invalid';
        }
        catch(JWTException $e){
            // do what when the token is not present
            $message = 'provide token';
        }

        return response()->json([
            'success' => false,
            'message' => $message,
        ]);

    }
}
