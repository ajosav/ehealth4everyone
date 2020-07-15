<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Mail\EmailVerified;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Traits\UserCodeTrait;

class AuthController extends Controller
{
    use UserCodeTrait;

    public function register(Request $request) {
        $validateInput = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required', 'string'],
            'date_of_birth' => ['required', 'date', 'date_format:Y-m-d', 'before_or_equal:today'],
            'phone' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string']
        ]);

        if($validateInput->fails()) {
            return $this->failed($validateInput->errors());
        }

        $prefix = $request['role'] == 'doctor' ? 'DOC-' : 'PAT-';
        
        $user_code = $this->createUniqueUserCode($prefix);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'dob' => $request->date_of_birth,
            'phone' => $request->phone,
            'user_code' => $user_code,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);

        return $this->success('User Account Creation was succesful');

    }

    public function login(Request $request)
   {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);
       
        if(!auth()->attempt($loginData)) {
            return $this->failed('Invalid credentials');
        }
        // if ($request->user()->hasVerifiedEmail()) {
            $accessToken = auth()->user()->createToken('authToken')->accessToken;

            return $this->success('Authenticated', ['user' => auth()->user(), 'access_token' => $accessToken]);
        // }
       

   }
}
