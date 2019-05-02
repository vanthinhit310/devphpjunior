<?php

namespace App\Http\Controllers;

use App\Service\FeedbackService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    //
    /**
     * @param Request $request
     * @param FeedbackService $feedbackService
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processingFeedback(Request $request, FeedbackService $feedbackService){
        try{
            DB::beginTransaction();
            $datas = [
              'name_fb' => Input::get('full_name'),
              'email_fb' => Input::get('mail'),
              'subject_fb' => Input::get('subject'),
              'phone_fb' => Input::get('tel'),
              'message_fb' => Input::get('comment')
            ];
            if ($feedback = $feedbackService->createFeedbackRecords($datas)){
                Mail::send('email.general', $feedback->toArray(), function ($message) use ($request, $feedback) {
                    $message->from(setting('admin.admin_email'), $request['subject']);
                    $message->to($request->mail, setting('site.title'))->subject('Feedback from ' . $request['full_name']);
                });
            }
            DB::commit();
            return redirect(route('app.thank-you'))->with(['message'=> 'Thanks your feedback!']);
        }catch (\Throwable $throwable){
            DB::rollBack();
            Log::error($throwable->getMessage());
            return redirect(route('app.contacts'))->with('messageError', $throwable->getMessage());
        }
        DB::rollBack();
        return redirect(route('app.contacts'))->with('messageError', ('unknown_error'));
    }
}
