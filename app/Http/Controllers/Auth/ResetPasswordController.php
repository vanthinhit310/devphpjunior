<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */


    /**
     * Where to redirect users after resetting their password.
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
        $this->middleware('guest');
    }

    public function changPassword(Request $request)
    {
        $data = [
            'new_password' => $request->new_password,
            'email' => $request->email
        ];
        $rule = [
            'new_password' => 'min:8'
        ];
        $message = [
            'new_password.min' => 'The password must be at least 8 characters.'
        ];
        $validator = Validator::make($data, $rule, $message);
        if ($validator->fails()):
            $html = '';
            $errors = $validator->errors()->toArray();
            foreach ($errors as $err) {
                $html = $err[0];
            }
            return redirect()->back()->with([
                'error_change_password' => $html
            ]);
        endif;
        try {
        DB::beginTransaction();
            $user = User::where('email', $data['email'])->first();
            if (isset($user)) {
                $user->update([
                    'password' => Hash::make($data['new_password'])
                ]);
            }
            DB::commit();
            return redirect()->route('app.home')->with(['success' => 'Successfully! Your password has changed.']);
        } catch (\Throwable $throwable) {
            DB::rollBack();
            return redirect()->route('app.home')->with([
                'error' => 'Have an error. Please try again.',
                'devMessage' => $throwable->getMessage()
            ]);
        }
    }
}
