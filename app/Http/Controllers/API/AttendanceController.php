<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use SimpleSoftwareIO\QrCode\BaconQrCodeGenerator;
use Illuminate\Support\Facades\Storage;
use Models\Data;

class AttendanceController extends Controller
{
    public function index(Request $request){

        $attend = Attendance::all();
        $image = Data::format('png')
                 ->size(200)->errorCorrection('H')
                 ->generate('A simple example of QR code!');
        $output_file = '/img/qr-code/img-' . time() . '.png';
        Storage::disk('local')->put($output_file, $image);
        return view('qrCode', compact('qrData', $qrData));

        // $attend = new Attendance;
        // $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
        // $barcode = '< img src="data:image/png;base64,' . base64_encode($generator->getBarcode($number, $generator::TYPE_CODE_128)) . '" >';

        // $product->barcode = $barcode;
        // $product->save();
                // $qrcode = new BaconQrCodeGenerator;
        // $qrcode->size(100)->generate("your text", 'path to save file');
        // Attendance::whereId($user->id)->update([
        //     'code' => $qrcode
        // ]);

    }
    public function auth(Request $request){

        $token = Str::random(64);
        Attendance::whereId($user->id)->update([
            'remember_token' => $token
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Berhasil scan'
        ], 200);
    }
}
