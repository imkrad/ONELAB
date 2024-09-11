<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class FinanceAccess
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if ($user && ($user->userrole->role->name === 'Accountant' || $user->userrole->role->name === 'Cashier')) {
            return $next($request);
        }
        
        return redirect('/dashboard')->with('error', 'Unauthorized access.');
    }
}
