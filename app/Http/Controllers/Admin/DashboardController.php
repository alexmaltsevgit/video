<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all()->toArray();

        return view('admin.dashboard', ['users' => $users]);
    }
}
