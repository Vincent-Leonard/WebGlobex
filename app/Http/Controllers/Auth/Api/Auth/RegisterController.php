<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(Request $request){

        $this->validate($request, [
            'name' => 'required', 
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = $this->newUser($request->all());

        event(new ActivationEvent($user));

        if(empty($user)){
            return response([
                'message' => 'Failed to create account'
            ]);
        }else{
            //send email
            return response([
                'message' => 'Account created'
            ]);
        }
    }

    private function newUser(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            // 'role_id' => 2,
            // 'activation_token' => Str::random(20),
        ]);    
    }
}
