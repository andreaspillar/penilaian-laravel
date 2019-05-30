<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Validator;

class AuthController extends Controller
{

    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'name' => 'required',
          'email' => 'required|email',
          'password' => 'required',
          'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
          return response()->json(['error'=>$validator->errors()]);
        }
        $postArray = $request->all();
        $postArray['password'] = bcrypt($postArray['password']);
        $user = User::create($postArray);
        $success['token'] =  $user->createToken('LaraPassport')->accessToken;
        $success['name'] =  $user->name;
        return response()->json([
          'status' => 'success',
          'data' => $success,
        ]);
    }

    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
          $user = Auth::user();
          $success['token'] =  $user->createToken('LaraPassport')->accessToken;
          return response()->json([
            'status' => 'success',
            'data' => $success
          ]);
        } else {
          return response()->json([
            'status' => 'error',
            'data' => 'Unauthorized Access'
          ]);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 'Berhasil Keluar']);
    }

    public function user(Request $request)
    {
        $user = Auth::user();
        return response()->json(['success' => $user]);
    }
}
