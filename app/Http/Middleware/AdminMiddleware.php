<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()) {
            $user = Auth::user();
            if($user->role == "admin" || $user->role == "user") {
                
                // If user is just a 'user', restrict access to only Dashboard and Reports
                if($user->role == 'user'){
                    $allowedRoutes = ['admin.dashboard', 'admin.report.index', 'admin.report.getall', 'admin.report.store', 'admin.report.status', 'admin.report.destroy', 'admin.report.get', 'admin.report.update', 'admin.report.pdf', 'admin.logout', 'admin.profile', 'admin.update.profile', 'admin.change.password', 'admin.update.password'];
                    if(!in_array($request->route()->getName(), $allowedRoutes)){
                        return redirect()->route('admin.dashboard')->with('error', 'You do not have permission to access this page.');
                    }
                }

                return $next($request);
            }else{
                return redirect()->back();
            }
        }else{
            return redirect()->route('admin.login');
        }
    }
}
