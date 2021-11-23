<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(LoginRequest $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'phone' => ['required', 'string', 'regex:/^([0-9\+\(\)]*)$/', 'min:10', 'unique:users'],
        ]);

        do {
            $token = substr(sha1(time()), 0, 10);
            $same_token_exists = boolval(
                User::query()->where('token', $token)->first()
            );
        } while ($same_token_exists);

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'ip' => $request->ip(),
            'token' => $token,
        ]);

        event(new Registered($user));

        return redirect('payment/' . $request->phone);
    }
}
