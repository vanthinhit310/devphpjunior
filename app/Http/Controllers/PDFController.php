<?php

namespace App\Http\Controllers;

use App\Service\DailyLogService;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    //
    public function index(Request $request, DailyLogService $service)
    {
        $id = $request->input('id');
        $details = $service->getLogDetails($id);
        $data = ['id' => $id, 'details' => $details,'titlePage' =>'Log#'.$id];
        $pdf = PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif'])->loadView('log-daily.log-detail', $data);
        return $pdf->download('log#' . $id . '.pdf');
    }
}
