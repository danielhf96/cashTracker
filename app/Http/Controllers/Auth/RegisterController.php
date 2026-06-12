<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignUpRequest;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(SignUpRequest $request)
    {
        $data = $request->validated();
    }
}
