<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class ApiAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('token');
        if($token !== null){
            $user=User::where('remember_token','=',$token)->first();
            if($user !== null){
                return $next($request);
            }else{
                return response()->json([
                    'msg'=>'not vaild token'
                ]);
            }
        }else{
            return response()->json([
                'msg'=>'token not sent'
            ]);
        }



    }
}
