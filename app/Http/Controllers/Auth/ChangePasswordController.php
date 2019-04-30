<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{
    //
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
        $this->middleware('auth');
    }

    public function updateNewPassword(Request $request)
    {
        $datas = $request->all();
        $rules = [
            'new_password_update' => 'min:8',
        ];
        $message = [
            'new_password_update.min' => 'The password must be at least 8 characters.'
        ];
        $validator = Validator::make($datas, $rules, $message);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        try {
            DB::beginTransaction();
            $emailUser = Auth::user()->email;
            $user = User::where('email', $emailUser)->first();
            if (isset($user)):
                if (Hash::check($request->current_password, $user->password)) {
                    $user->update([
                        'password' => Hash::make($request->new_password_update)
                    ]);
                } else {
                    return redirect()->back()->with([
                        'error_update_password' => 'The current password not match. Please check again.'
                    ]);
                }
            endif;
            DB::commit();
            Auth::logout();
            return redirect()->route('app.home')->with([
                'success' => 'Successfully! Password has changed.'
            ]);
        } catch (\Throwable $throwable) {
            DB::rollBack();
            return redirect()->back()->with([
                'error_update_password' => 'Have an error! Please try again.'
            ]);
        }
    }
}
