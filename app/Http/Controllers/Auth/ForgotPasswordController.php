<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\Auth\PasswordReset;
use App\Notifications\PasswordNotification;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

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
        $message = [
            'email_reset.exists' => 'We cannot find any accounts registered with this email.'
        ];
        return Validator::make($data, [
            'email_reset' => 'exists:users,email'
        ], $message);
    }

    protected function create(array $data)
    {
        $reset = PasswordReset::create([
            'email' => $data['email_reset'],
            'token' => str_random(40) . time()
        ]);
        $reset->notify(new PasswordNotification($reset));
        return $reset;
    }

    public function resetPassword(Request $request)
    {
        $this->validator($request->all())->validate();
        if ($this->create($request->all())) {
            return redirect()->back()->with([
                'success' => 'Congratulations! We have send to you an email verify. Please check it and create new password.'
            ]);
        } else {
            return redirect()->back()->with([
                'error' => 'Have an error! Please try again.'
            ]);
        }
    }

    public function setNewPassword($token = null)
    {
        $re = PasswordReset::where('token', $token)->first();
        $email = $re->email;
        if (empty($re)) {
            return redirect()->to(route('app.reset'))
                ->with(['error' => 'Your activation code is either expired or invalid.']);
        }
        $re->update([
            'token' => null
        ]);
        return redirect()->route('app.change')->with(['email' =>$email]);
    }
}
