<?php

namespace App\Exceptions;
use Carbon\Carbon;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Support\Facades\Mail;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception $exception
     * @return void
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        if ($exception instanceof \Throwable) {
            $mytime = Carbon::now();
            Mail::send('email.exception', ['error' => $exception->getMessage(),'time'=>$mytime], function ($m) use ($exception) {
                $m->to('vanthinh.34101997@gmail.com', 'Lê Văn Thịnh')->subject('Error: '. $exception->getMessage());
            });
        }
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof TokenMismatchException) {
            return response()->redirect('login')->with('status', 'Token expired, please try again.');
        }
        return parent::render($request, $exception);
    }
}
