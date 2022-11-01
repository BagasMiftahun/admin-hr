<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\Data;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DataController extends Controller
{
    public function index($id){
        $data = Data::all();
        $qr_code = Str::random(30);
        $qrcode = QrCode::size(400)->generate();
        return view('qrcode',compact('qrcode'));

        if(view('qrcode')->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Silahkan untuk refresh halaman ini',
                'data' => $qrcode->errors()
            ], 400);
        }
        else{
            $token = Str::random(64);
            Data::whereId($data->id)->update([
                'remember_token' => $token
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Berhasil registrasi'
            ], 200);
        }

        // $currentTime = Carbon::now();
        // echo $currentTime->toDateTimeString();
        // return view ('welcome', ['data' => $data]);
    }
}
