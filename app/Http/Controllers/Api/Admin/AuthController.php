<?php

namespace App\Http\Controllers\Api\Admin;

use App\Adminuser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
    //
    use AuthenticatesUsers;

    private function username()
    {
        return 'username';
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    private function generateToken($user_id)
    {
        $api_token = str_random(60);
        Adminuser::where('id', $user_id)->update(['api_token' => $api_token]);  
        return $api_token;
    }

    public function login(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);

        if ($this->attemptLogin($request)) {
            $user = $this->guard()->user();
            $api_token = $user->api_token;
            if (is_null($api_token)) {
                $api_token = $this->generateToken($user->id);
            }
            
            return response()->json([
                'success'       => true,
                'message'       => "Login Berhasil",
                'token_type'    => "Bearer",
                'token'         => $api_token,
            ]);
        }

        return $this->sendFailedLoginResponse($request);
    }

}
