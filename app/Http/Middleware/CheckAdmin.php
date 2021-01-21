<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use App\User;


use Closure;

class CheckAdmin
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
        $if_admin=User::with("isadmin")->where("id", Auth::user()["id"])->get()[0]["isadmin"];
        if($if_admin==null){
            return redirect()->route("notadmin");

        }
        if ($if_admin["is_admin"]<1) {
            return redirect()->route("notadmin");
        }
        return $next($request);
    }
}
