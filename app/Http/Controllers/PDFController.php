<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    //
    public function index(Request $request)
    {
        $data = [];
//        $pdf = PDF::loadView($view_name,$data);
//        return $pdf->download($view_name.'.pdf');
    }
}
