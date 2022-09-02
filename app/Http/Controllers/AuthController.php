<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function index(Request $request){
        $validator= Validator::make($request->all(),[
            'email'=>['required','email'],
            'password'=>['required','min:8']

        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);

        }
        try {
            if (!Auth::attempt($request->only('email', 'password')))
        {
            return response()
                ->json(['message' => 'Login gagal'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json(['message' => 'Hi '.$user->name.', welcome to home','access_token' => $token, ]);
        } catch (QueryException $e) {
            return response()->json($e, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
