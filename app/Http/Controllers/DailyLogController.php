<?php

namespace App\Http\Controllers;

use App\Service\DailyLogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class DailyLogController extends Controller
{
    //
    public function create(Request $request, DailyLogService $service)
    {
        $datas = $request->all();
        $rules = [
            'title' => 'required',
            'private' => 'required'
        ];
        $message = [
            'title.required' => 'Some thing went wrong!',
            'private.required' => 'Some thing went wrong!'
        ];
        $validator = Validator::make($datas, $rules, $message);
        if ($validator->fails()):
            return redirect()->back()->withInput(Input::all())->withErrors($validator->errors());
        endif;
        DB::beginTransaction();
        try {
            if ($log = $service->createLog($datas)):
                DB::commit();
                return redirect()->route('app.log-index')->with(['success' => 'Your log have been created!']);
            endif;
        } catch (\Throwable $throwable) {
            DB::rollBack();
            return redirect()->route('app.log-index')->with(['error' => 'You don\'t have permission to this action. Please login to continue.']);
        }
        DB::rollBack();
        return redirect()->route('app.log-index')->with(['error' => 'Unknown error - Try later!']);
    }
}
