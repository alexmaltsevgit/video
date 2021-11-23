<?php

namespace App\Http\Requests\User\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'phone' => ['required', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'unique:users'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate()
    {
        if (!Auth::attempt($this->only('name', 'phone'), $this->boolean('remember'))) {
            throw ValidationException::withMessages([
                'name' => __('auth.failed'),
            ]);
        }
    }
}
