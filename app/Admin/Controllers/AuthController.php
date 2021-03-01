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
        $the_roles = $the_user->with('roles')->first()->roles->pluck('name')->toArray();
        if (\in_array('Provider', $the_roles)) {
            $the_provider_status = Mstprovider::find($the_user->first()->provider_id)->status_id;
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
