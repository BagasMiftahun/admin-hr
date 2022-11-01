<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Data;
use Carbon\Carbon;
// use SimpleSoftwareIO\QrCode\BaconQrCodeGenerator;

class DataController extends Controller
{
    public function index(){

        // $data = Data::all();
        // return view ('welcome', ['data' => $data]);
    }
    // public function store(Request $request){
    //     $data = new Data;
    //     $data->name = $request->name;
    //     $data->time = $request->time;
    //     $data->save();
    //     return back();
    // }
    // public function generate ($id)
    // {
    //     $data = Data::findOrFail($id);
    //     // $qrcode = new BaconQrCodeGenerator;
    //     $qrcode = QrCode::size(400)->generate($data);
    //     return view('qrcode',compact('qrcode'));
    // }
}
