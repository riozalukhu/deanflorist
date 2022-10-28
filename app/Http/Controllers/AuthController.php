<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('pages.auth');
    }

    public function do_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users,email',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json([
                'status' => 'success',
                'message' => 'Login successful',
                'redirect' => route('admin.dashboard'),
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Password anda salah',
            ]);
        }
    }

    public function do_logout()
    {
        // logout user
        Auth::logout();
        return redirect('/login');
    }
}
