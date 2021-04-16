<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthKey
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

        $token=$request->header('APP_KEY');
        $name=$request->header('Name_ADMIN');
        $email=$request->header('Email');
        $dienthoai = $request->header('Dienthoai',);
        $sdt = Admin::where(['dien_thoai' => $dienthoai,'email' => $email])->first();
        if($token != $dienthoai || $name!=$email)
        {
            return response()->json(['message'=>'App Key Not Found'],401);
        }
        return $next($request);
    }
}
