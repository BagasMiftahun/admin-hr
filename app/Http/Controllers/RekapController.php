<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absensi;
use App\Models\Employes;
use App\Models\EmployesCategory;
use resources\views\PDF;

class RekapController extends Controller
{
    public function index(){
        return view('user.index',[
            "title" => "Rekap"
        ]);
    }
    public function show($table){
        if($table=="employes_categories"){
            $resource = Kelas::get();
            return view('EmployesCategory', ['resource' => $resource]);
        }
    }
    public function pdf(Request $request){
        $resource = Kelas::find($request->id);
        foreach($resource->siswa as $index => $res){
            $alfa=Absensi::where(['siswa_id'=>$res->id_siswa])->where('status','Alfa');
            $izin=Absensi::where(['siswa_id'=>$res->id_siswa])->where('status','Izin');
            $sakit=Absensi::where(['siswa_id'=>$res->id_siswa])->where('status','Sakit');
            if($request->tanggal_awal != 0){
                $alfa=$alfa->where('tanggal','>=',$request->tanggal_awal);
                $izin=$izin->where('tanggal','>=',$request->tanggal_awal);
                $sakit=$sakit->where('tanggal','>=',$request->tanggal_awal);
            }
            if($request->tanggal_akhir != 0){
                $alfa=$alfa->where('tanggal','<=',$request->tanggal_akhir);
                $izin=$izin->where('tanggal','<=',$request->tanggal_akhir);
                $sakit=$sakit->where('tanggal','<=',$request->tanggal_akhir);
            }
            $alfa=$alfa->get();
            $izin=$izin->get();
            $sakit=$sakit->get();
        }
        if($request->tgl_awal==$request->tgl_akhir || $request->tgl_awal=="" || $request->tgl_akhir==""){
            $tanggal="-";
        }else{
            $tanggal = DATE('d F Y',strtotime($request->tgl_awal))." / ".DATE('d F Y',strtotime($request->tgl_akhir));
        }
        $pdf = \App::make('dompdf.wrapper');
        $pdf->setPaper('A4', 'potrait');
        $pdf->loadHTML(view("layouts.pribadipdf",['resource'=>$resource, 'tanggal'=>$tanggal, 'alfa'=>$alfa,'izin'=>$izin,'sakit'=>$sakit]));
        return $pdf->stream();
    }
    public function rekap($id){
        $resource = Kelas::find($id);
        return view('admin/rekapabsensi',['resource' => $resource]);
    }
    public function hitung(Request $request){
        $resource = Kelas::find($request->id);
        foreach($resource->siswa as $index => $res){
            $alfa=Absensi::where(['siswa_id'=>$res->id_siswa])->where('status','Alfa');
            $izin=Absensi::where(['siswa_id'=>$res->id_siswa])->where('status','Izin');
            $sakit=Absensi::where(['siswa_id'=>$res->id_siswa])->where('status','Sakit');
            if($request->tanggal_awal != 0){
                $alfa=$alfa->where('tanggal','>=',$request->tanggal_awal);
                $izin=$izin->where('tanggal','>=',$request->tanggal_awal);
                $sakit=$sakit->where('tanggal','>=',$request->tanggal_awal);
            }
            if($request->tanggal_akhir != 0){
                $alfa=$alfa->where('tanggal','<=',$request->tanggal_akhir);
                $izin=$izin->where('tanggal','<=',$request->tanggal_akhir);
                $sakit=$sakit->where('tanggal','<=',$request->tanggal_akhir);
            }
            $alfa=$alfa->get();
            $izin=$izin->get();
            $sakit=$sakit->get();

        }
    }
}
