<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\Member;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'app.home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'unique:members'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $member = Member::create([
            'name' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'token' => str_random(40) . time(),
        ]);
        $member->notify(new UserActivate($member));
        return $member;
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($member = $this->create($request->all())));
        return redirect()->route('app.home')
            ->with(['success' => 'Congratulations! Your account is registered, you will shortly receive an email to activate your account.']);

    }

    /**
     * @param $token
     */
    public function activate($token = null)
    {
        $member = Member::where('token', $token)->first();

        if (empty($member)) {
            return redirect()->to(route('app.home'))
                ->with(['error' => 'Your activation code is either expired or invalid.']);
        }

        $member->update(['token' => null, 'active' => Member::ACTIVE]);

        return redirect()->route('app.home')
            ->with(['success' => 'Congratulations! your account is now activated.']);
    }
}
