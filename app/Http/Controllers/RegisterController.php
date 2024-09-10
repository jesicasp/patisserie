<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Services\RegisterService;



class RegisterController extends Controller
{
    protected $registerService;

    public function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }

    public function index()
    {
        return view('auth.register');
    }


    public function register(RegisterRequest $request){

        $validatedData = $request->validated();

        $this->registerService->createUser($validatedData);

        return redirect()->route('login')->with('success', 'Registration successful!');

    }
}
