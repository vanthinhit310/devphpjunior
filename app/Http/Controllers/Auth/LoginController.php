<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

/**
 * @method validator(array $all)
 */
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function validateLogin(array $userData)
    {
        $message = [
            'email_log.exists' => 'The account you are trying to login is not activated or it has been disabled.'
        ];
        return Validator::make($userData, [
            'email_log' => 'exists:members,email'
        ], $message);
    }

    public function login(Request $request)
    {
       $userData = [
           'email' => $request->email_log,
           'password' => $request->password,
           'active' => 1
       ];
        $this->validateLogin($request->all())->validate();
        if (Auth::attempt($userData)) {
            //đăng nhập thành công thì hiển thị thông báo đăng nhập thành công
            return redirect()->route('app.home')->with(['success' => 'Login success!']);
        } else {
            return redirect()->route('app.home')->with(['error' => 'Login failed! Please check your email and password!']);
        }
    }
}
