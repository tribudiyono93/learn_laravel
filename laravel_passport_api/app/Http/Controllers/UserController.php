<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Log;
use Validator;

class UserController extends Controller
{
    public function signUp(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'              => 'required|string|min:10',
            'email'             => 'required|email',
            'password'          => 'required',
            'confirm_password'  => 'required|same:password',
        ]);

        if ($validator->fails()) { 
            return response()->json(['error'=> [
                'code' => 400,
                'message' => "Bad Request",
                'errors' => $validator->errors()
            ]], 400);            
        }


        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        User::create($data);

        return response()->json(['message' => 'User created successfully'], 201);
    }

    public function login(Request $request) {
        $request->validate([
            'email'         => 'required|string|email',
            'password'      => 'required|string',
            'remmember_me'  => 'boolean'
        ]);

        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Authorization failed'
            ], 401);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        //print_r('Token Result : ' . $tokenResult);
        $token = $tokenResult->token;
        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
        $token->save();

        //print_r('Token : ' . $token);

        return response()->json([
            'message'               => 'Authorization Granted',
            'access_token'          => $tokenResult->accessToken,
            'token_type'            => 'Bearer',
            'expires_at'            => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }
}
