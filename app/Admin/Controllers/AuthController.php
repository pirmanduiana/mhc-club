<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AuthController as BaseAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Mstprovider;
use Illuminate\Support\Facades\Lang;
use App\Administrator;

class AuthController extends BaseAuthController
{

    /**
     * @return string|\Symfony\Component\Translation\TranslatorInterface
     */
    protected function getFailedLoginMessageProvider()
    {
        return Lang::has('auth.failed')
            ? 'Maaf provider sudah tidak aktif pada sistem.'
            : 'Maaf provider sudah tidak aktif pada sistem.';
    }

    /**
     * Handle a login request.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function postLogin(Request $request)
    {
        $credentials = $request->only([$this->username(), 'password']);

        /** @var \Illuminate\Validation\Validator $validator */
        $validator = Validator::make($credentials, [
            $this->username()   => 'required',
            'password'          => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        // check wheter the provider active or not
        $the_user = Administrator::where('username', $credentials['username']);
        $the_role = $the_user->join('admin_role_users','admin_role_users.user_id','=','admin_users.id');
        $the_role = $the_role->join('admin_roles','admin_roles.id','=','admin_role_users.role_id');
        $the_role = $the_role->select('admin_users.*', DB::raw('admin_roles.name as role_name'))->first();
        if ($the_role->role_name=="Provider") {
            $the_provider_status = Mstprovider::find($the_role->provider_id)->status_id;
            if ($the_provider_status==2) {
                return back()->withInput()->withErrors([
                    $this->username() => $this->getFailedLoginMessageProvider(),
                ]);
            }
        }

        if ($this->guard()->attempt($credentials)) {
            return $this->sendLoginResponse($request);
        }

        return back()->withInput()->withErrors([
            $this->username() => $this->getFailedLoginMessage(),
        ]);
    }

}
