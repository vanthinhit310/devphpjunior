<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    //
    public function getQrCode()
    {
        $param =[];
        $param['titlePage'] = 'QRCode with Laravel';
        $param['qrCode'] = QrCode::size(250)->generate('https://www.facebook.com/vanthinh.le34101997');
        return view('practices.qrCode', $param);
    }
}
