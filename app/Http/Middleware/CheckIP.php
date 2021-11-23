<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class CheckIP
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->route('token');
        $ip = $request->ip();

        $user = User::query()->where('token', $token)->first();

        if (
            !$user or
            $user->ip !== $ip
        ) return redirect('/register');

        return $next($request);
    }
}
