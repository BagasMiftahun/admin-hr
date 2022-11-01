<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use LaravelQRCode\Facades\QRCode;


class AttendanceController extends Controller
{
    public function index(){
        $attendance = new Attendance;
        $file = public_path('qrcodes.png');
        $qr = QRCode::text('QR Code Generator for Laravel!')->setOutFile($file)->setSize(20)->png();

        $attendance->code = json_encode($qr);

        return view('qrcode',compact('qr'));
    }
    public function scan(Request $request){
        return view('attend.scan');
    }
}
