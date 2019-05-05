<?php

namespace App\Http\Controllers;

use App\Model\DailyLog;
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

    public function loadDataAjax(Request $request)
    {
        $output = '';
        $id = $request->id;
        $posts = DailyLog::where('id', '<', $id)->orderBy('created_at', 'DESC')->limit(2)->get();

        if (!$posts->isEmpty()) {
            foreach ($posts as $post) {
                $url = url('log/' . $post->id);
                $body = substr(strip_tags($post->content), 0, 500);
                $body .= strlen(strip_tags($post->content)) > 500 ? "..." : "";
                $output .= '<div class="each-log">
                            <a href="' . $url . '">
                                <h3 class="title text-capitalize"><i class="fab fa-hotjar"></i>' . $post->title . '</h3>
                                <span>' . $body . '</span>
                                <span class="author"><i class="fal fa-user-chart"></i> Write by :' . $post->private_author . '</span>
                                <span class="read-more">Read more <i class="fal fa-angle-double-right"></i></span>
                            </a>
                        </div>';
            }

            $output .= '<div id="remove-row">
                            <button id="btn-more" data-id="' . $post->id . '" class="nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" > Load More </button>
                        </div>';

            echo $output;
        }
    }
}
