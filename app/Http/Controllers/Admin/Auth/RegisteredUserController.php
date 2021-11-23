<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param \App\Http\Requests\LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8',
        ]);

        Auth::guard('admin')->login($admin = Admin::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]));

        event(new Registered($admin));

        return redirect(route('admin.dashboard'));
    }
}
