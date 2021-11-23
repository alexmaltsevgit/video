<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create(Request $request, string $phone)
    {
        ddd($request->is('payment/*'));
        if ($request->is('payment/*'))
            return view('payment', ['phone' => $phone]);
    }
}
