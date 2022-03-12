<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Stringable;
use Illuminate\Support\Str;

class ApiAuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required | max:50',
                'email' => 'required | email',
                'password' => 'required |confirmed',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "errors" => $validator->errors(),
            ], 200);
        }

        $token = Str::random(64);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => $token,
        ]);


        return response()->json([
            "access_token" => $token
        ]);
    }
    //====================================================================================

    public function logout(Request $request)
    {
        $token = $request->header('token');
        $user = User::where('remember_token', '=', $token)->first();

        $user->update([
            'remember_token' => null,
        ]);

        return response()->json([
            "msg" => "you loged out",
        ], 200);
    }
    //==================================================================================

    public function login(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required |email',
                'password' => 'required ',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "errors" => $validator->errors(),
            ], 200);
        }

        $user = User::where('email', '=', $request->email)->first();

        if ($user !== null) {
            $correctPassword = Hash::check($request->password, $user->password);

            if ($correctPassword) {
                $token = Str::random(64);
                $user->update([
                    'remember_token' => $token,
                ]);
                return response()->json([
                    'access_token' => $token
                ], 201);
            } else {
                return response()->json([
                    'msg' => 'password not correct'
                ]);
            }
        }else{
            return response()->json([
                'msg'=>'email not correct'
            ],201);
        }
    }
}
